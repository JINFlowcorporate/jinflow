<?php

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

Route::get('/', function () {
    $charge = Coinbase::createCharge([
        'name' => 'Name',
        'description' => 'Description',
        'local_price' => [
            'amount' => 100,
            'currency' => 'USD',
        ],
        'pricing_type' => 'fixed_price',
    ]);

    return view('welcome');
})->name('home');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/our-team', function () {
    return view('team');
})->name('team');

Route::get('/nos-biens', function () {
    return view('pages.nos-biens');
})->name('nos-biens');

Route::get('lang/{lang}', [\App\Http\Controllers\LanguageController::class, 'switchLang'])->name('lang.switch');

Route::get('/nos-biens/{slug}', \App\Http\Livewire\Biens::class)->name('biens');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::post('coinbase/webhook', [\App\Http\Controllers\WebhookController::class])->name('coinbase-webhook');

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
