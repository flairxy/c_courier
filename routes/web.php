<?php

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

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminShipmentController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\User\ApplicationController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\ShipmentController;
use App\Models\Shipment;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/track-shipment', 'TrackShipmentController@index')->name('track-shipment');
Route::post('/track', 'TrackShipmentController@track')->name('track');
Route::post('/notify/{id}', 'Admin\ShipmentController@notify')->name('shipment-notify');
Route::post('/invoice', ['uses' => 'TrackShipmentController@printInvoice'])->name('admin.download');

Route::group(['namespace' => 'Admin', 'as' => 'admin.', 'middleware' => ['admin'], 'prefix' => 'management'], function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::group(['prefix' => 'shipments', 'as' => 'shipments.'], function () {
        Route::get('/', [AdminShipmentController::class, 'index'])->name('index');
        Route::get('pending', [AdminShipmentController::class, 'pending'])->name('pending');
        Route::get('delivered', [AdminShipmentController::class, 'delivered'])->name('delivered');
        Route::get('edit/{id}',  [AdminShipmentController::class, 'edit'])->name('edit');
        Route::post('dispatch/{id}',  [AdminShipmentController::class, 'dispatch'])->name('dispatch');
        Route::post('pickup/{id}',  [AdminShipmentController::class, 'pickup'])->name('pickup');
        Route::post('isDelivered/{id}',  [AdminShipmentController::class, 'isDelivered'])->name('isDelivered');
        Route::post('delete/{id}',  [AdminShipmentController::class, 'destroy'])->name('destroy');
    });
    Route::group(['prefix' => 'user', 'as' => 'users.'], function () {
        Route::get('/', [UsersController::class, 'index'])->name('index');
        Route::post('delete/{id}',  [UsersController::class, 'destroy'])->name('destroy');
    });
    Route::group(['prefix' => 'manager', 'as' => 'managers.'], function () {
        Route::get('/', [UsersController::class, 'managers'])->name('index');
        Route::get('/create', [UsersController::class, 'createManager'])->name('create');
        Route::post('/store', [UsersController::class, 'storeManager'])->name('store');
        Route::get('/edit/{id}', [UsersController::class, 'editManager'])->name('edit');
        Route::post('/update/{id}', [UsersController::class, 'updateManager'])->name('update');
        Route::post('delete/{id}',  [UsersController::class, 'destroy'])->name('destroy');
    });
});



Route::group(['namespace' => 'User', 'middleware' => ['auth', 'user'], 'as' => 'user.'], function () {
    Route::get('/dashboard',  [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/application',  [DashboardController::class, 'getApplication']);
    Route::group(['prefix' => 'user'], function () {
        Route::group(['prefix' => 'application','as' => 'application.'], function () {
            Route::post('apply', [ApplicationController::class, 'store']);
            Route::post('apply/update/{id}', [ApplicationController::class, 'update']);
            Route::post('payment/confirm/{id}', [ApplicationController::class, 'confirmPayment']);
        });
    });
});

Auth::routes();
