<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketTypeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\AdminController;


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





//adminroute
Route::middleware(['auth:sanctum'])->group(function () {

    route::get('/', [HomeController::class, 'redirect'])->name('index');

    route::get('/redirect', [HomeController::class, 'redirect']);
    route::get('/change-status/{ticket}/{status}', [HomeController::class, 'changeStatus'])->name('changeStatus');

    
    Route::post('/ticket/store', [TicketController::class, 'store'])->name('store');//lps check out
    Route::get('/buyticket/resident', [TicketController::class, 'resident'])->name('resident');
    Route::get('/buyticket/nonResident', [TicketController::class, 'nonResident'])->name('nonResident'); 
    Route::post('/cart/store', [CartController::class, 'store'])->name('cartStore');
    Route::get('/cart/show', [CartController::class, 'show'])->name('cartShow');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cartRemove');
    Route::get('/payment', [TicketController::class, 'payment'])->name('payment');
    Route::get('/payment/confirmation', [TicketController::class, 'payment2'])->name('payment2');
    Route::get('/purchased-list', [TicketController::class, 'showPurchasedTicket'])->name('purchasedList');
    


    // Route::get('/checkout', [CheckOutController::class, 'store'])->name('checkout');
 
    

});
