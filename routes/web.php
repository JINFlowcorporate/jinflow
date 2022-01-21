<?php

use App\Events\OrderCompleted;
use App\Http\Controllers\DocusignController;
use App\Models\Biens;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\TransactionLog;
use App\Models\User;
use App\Models\UserBien;
use App\Models\ReferralLog;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use LaravelDocusign\Facades\DocuSign;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*Route::get('docusign',[DocusignController::class, 'index'])->name('docusign');
Route::get('connect-docusign',[DocusignController::class, 'connectDocusign'])->name('connect.docusign');
Route::get('docusign/callback',[DocusignController::class,'callback'])->name('docusign.callback');
Route::get('sign-document',[DocusignController::class,'signDocument'])->name('docusign.sign');*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::post('/newsletter/subscribe',"\\App\Http\\Controllers\\SubscriptionController@subscribe")->name('newsletter.subscribe');
Route::get('/our-team', function () {
    $images = [];
    foreach (\Illuminate\Support\Facades\File::allFiles(public_path('/images/team')) as $image)
    {
        $spl = new SplFileInfo($image);
        array_push($images, $spl);
    }
    return view('team', compact('images'));
})->name('team');

Route::get('/nos-biens', function () {
    return view('pages.nos-biens');
})->name('nos-biens');

Route::get('lang/{lang}', [\App\Http\Controllers\LanguageController::class, 'switchLang'])->name('lang.switch');

Route::get('/nos-biens/{slug}', \App\Http\Livewire\Biens::class)->name('biens');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/checkout', function () {
        return view('payment.checkout');
    })->name('checkout')
        ->middleware('EnsureCartIsNotEmpty');

    Route::get('/payment', [\App\Http\Controllers\PayController::class, 'index'])
        ->name('payment')
        ->middleware('EnsureCartIsNotEmpty');

    Route::post('/store-payment', [\App\Http\Controllers\PayController::class, 'store'])
        ->name('store-payment')
        ->middleware('EnsureCartIsNotEmpty');

    Route::get('/confirmation', function () {
        $user =   Auth::user();
        $total = Cart::total(2, '.', '');
        $cart = Cart::content();
        $cart_total = intval((int)$total);

        $order = new Order;
        $order->user_id = $user->id;
        $order->quantity = $cart->count();
        $order->total = $cart_total;
        $order->save();

        // refacto possible direct mettre à jour l'update avec l'utilisateur en cours
        $user->increment('invested', $cart_total);


        $referrer = User::where('referrer_code', $user->referred_by)->first();
        if($referrer){
            $referalTotal = $order->total * ( $referrer->referral_rate / 100);
            ReferralLog::create( [ 'user_id' => $referrer->id, 'order_id' => $order->id, 'rate' => $referrer->referral_rate, 'total' => $referalTotal]);
            TransactionLog::create( ['user_id' => $referrer->id, 'object_id' => $order->id, 'rate' => $referrer->referral_rate, 'amount' => $referalTotal,'type' => 'referral']);
            $referrer->increment('can_recover', $referalTotal);
        }

        $orders = [];

        foreach ($cart as $bien)
        {
            $order_product = new OrderProduct;
            $order_product->order_id = $order->id;
            $order_product->biens_id = $bien->id;
            $order_product->quantity = $bien->qty;
            $order_product->price_per_token = $bien->price;
            $order_product->total_price = $bien->price * $bien->qty;
            $order_product->save();
            $bienToUpdate = Biens::where('id', $bien->id)->first();
            $bienToUpdate->total_tokens = $bienToUpdate->total_tokens - $bien->qty;
            $bienToUpdate->save();
            array_push($orders, $order_product);
            UserBien::create(['user_id' => $user->id, 'biens_id' => $bien->id, 'quantity' => $bien->qty, 'price_per_token' => $order_product->price_per_token, 'total_price' => $order_product->total_price]);
            //  $bien = Biens::where('id', $bien->id)->first();
            //  $authed_user->tab($bien->name, (int)$bien->qty);
        }
        TransactionLog::create( [ 'user_id' => $user->id, 'object_id' => $order->id, 'type'=> 'order', 'amount' => $total]);

        Cart::destroy();
        OrderCompleted::dispatch($order);

        return view('pages.confirmation', compact('order'));
    })->name('confirmation')->middleware('ConfirmationFromOrder');

    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('dashboard');

    Route::get('/dashboard/holdings', function () {
        return view('user.holdings');
    })->name('holdings');

    Route::get('/dashboard/kyc', function () {
        return view('user.kyc');
    })->name('kyc_stuff');

    Route::get('/dashboard/orders', function () {
        return view('user.orders');
    })->name('orders');

    Route::get('/dashboard/account_details', function () {
        return view('user.account_details');
    })->name('account_details');

    Route::get('/dashboard/affiliation', function () {
        return view('user.affiliation');
    })->name('affiliation');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth:sanctum', 'verified', 'authadmin']], function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/users', function () {
        return view('admin.users');
    })->name('users');

    Route::get('/biens', function () {
        return view('admin.biens-admin');
    })->name('admin.biens');

    Route::get('/types', function () {
        return view('admin.types-admin');
    })->name('admin.types');

    Route::get('/orders', function () {
        return view('admin.orders-admin');
    })->name('admin.orders');

    Route::get('/affiliations', function () {
        return view('admin.affiliations-admin');
    })->name('admin.affilations');
});
