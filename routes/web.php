<?php

use Illuminate\Support\Facades\Route;

// FRONTEND CONTROLLERS
use App\Http\Controllers\Frontend\WelcomeController;
use App\Http\Controllers\Frontend\MenuController as FrontendMenuController;
use App\Http\Controllers\Frontend\ReservationController as FrontendReservationController;

// ADMIN CONTROLLERS
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ReservationController as AdminReservationController;

use App\Http\Controllers\ProfileController;


// =====================
// FRONTEND ROUTES
// =====================

Route::get('/', [WelcomeController::class,'index']);

Route::get('/menus', [FrontendMenuController::class,'index'])
    ->name('menus.index');


// ---- Reservation Steps ----
Route::get('/reservation/step-one', [FrontendReservationController::class, 'stepOne'])
    ->name('reservations.step.one');

Route::post('/reservation/step-one', [FrontendReservationController::class, 'storeStepOne'])
    ->name('reservations.store.step.one');

Route::get('/reservation/step-two', [FrontendReservationController::class, 'stepTwo'])
    ->name('reservations.step.two');

Route::post('/reservation/step-two', [FrontendReservationController::class, 'storeStepTwo'])
    ->name('reservations.store.step.two');


// ---- Menu Order (STEP 1 optional) ----
Route::get('/reservations/menu-order', [FrontendReservationController::class, 'menuOrder'])
    ->name('reservations.menu.order');

Route::post('/reservations/menu-order', [FrontendReservationController::class, 'storeMenuOrder'])
    ->name('reservations.menu.order.store');


// ---- Thank You Page ----
Route::get('/thankyou', function () {
    return view('thankyou');
})->name('thankyou');




// =====================
// USER PROFILE (AUTH)
// =====================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
        Route::prefix('admin')->name('admin.')->middleware('auth')->group(function() {
            Route::get('/orders', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('orders.index');
        });
        
});




// =====================
// ADMIN ROUTES
// =====================
Route::middleware(['auth', 'admin'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function() {

        Route::get('/', [AdminController::class, 'index'])
            ->name('index');

        Route::resource('/menus', MenuController::class);

        Route::resource('/categories', CategoryController::class);

        // Admin reservation CRUD (beda dengan frontend)
        Route::resource('/reservations', AdminReservationController::class);
    });

require __DIR__.'/auth.php';
