<?php

use App\Http\Controllers\DocusignController;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Shakurov\Coinbase\Facades\Coinbase;

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
Route::get('docusign',[DocusignController::class, 'index'])->name('docusign');
Route::get('connect-docusign',[DocusignController::class, 'connectDocusign'])->name('connect.docusign');
Route::get('docusign/callback',[DocusignController::class,'callback'])->name('docusign.callback');
Route::get('sign-document',[DocusignController::class,'signDocument'])->name('docusign.sign');

Route::post('coinbase/webhook', [\App\Http\Controllers\WebhookController::class])->name('coinbase-webhook');

/*Route::post('/coinbase', function () {

    $client = new \GuzzleHttp\Client();

    $response = $client->request('POST', 'https://api.exchange.coinbase.com/orders', [
        'body' => '{"profile_id":"default profile_id","type":"limit","side":"buy","stp":"dc","stop":"loss","time_in_force":"GTC","cancel_after":"min","post_only":"false"}',
        'headers' => [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ],
    ]);

    dd($response->getBody());
});*/

Route::get('/', function () {
    /*$charge = Coinbase::createCharge([
        'name' => 'JINFlow Test',
        'description' => 'Description test',
        'local_price' => [
            'amount' => 1,
            'currency' => 'USD',
        ],
        'metadata' => [
            'cart_id' => 1,
            'user_id' => 1
        ],
        'pricing_type' => 'fixed_price',
        'redirect_url' => back(),
        'cancel_url' => back()
    ]);

    return redirect()->away($charge['data']['hosted_url']);*/
    return view('welcome');
})->name('home');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

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
        $biens = Cart::content();
        $total = Cart::total();
        $user = \Illuminate\Support\Facades\Auth::user();
        return view('payment.checkout', compact('biens', 'total', 'user'));
    })->name('checkout')
        ->middleware('EnsureCartIsNotEmpty');

    Route::get('/payment', [\App\Http\Controllers\PayController::class, 'index'])
        ->name('payment')
        ->middleware('EnsureCartIsNotEmpty');

    Route::post('/store-payment', [\App\Http\Controllers\PayController::class, 'store'])
        ->name('store-payment')
        ->middleware('EnsureCartIsNotEmpty');

    Route::get('/confirmation', function () {
        Cart::destroy();

        $order = Order::where('user_id', Auth::id())->latest()->first();

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

    Route::get('/orders', function () {
        return view('admin.orders-admin');
    })->name('admin.orders');
});
