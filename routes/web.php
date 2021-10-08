<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/nos-biens/{slug}', \App\Http\Livewire\Biens::class)->name('biens');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
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
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/users', function () {
        return view('admin.users');
    })->name('users');

    Route::get('/biens', function () {
        return view('admin.biens-admin');
    })->name('admin.biens');
});

Route::get('/checkout', function () {
    return view('pages.checkout');
})->name('checkout');
