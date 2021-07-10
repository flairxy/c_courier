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
use App\Http\Controllers\Admin\AdminApplicationController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\User\ApplicationController;
use App\Http\Controllers\User\DashboardController;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Admin', 'as' => 'admin.', 'middleware' => ['admin'], 'prefix' => 'management'], function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::group(['prefix' => 'applications'], function () {
        Route::get('/', [AdminApplicationController::class, 'index']);
        Route::get('/edit', [AdminApplicationController::class, 'edit']);
        Route::get('/all', [AdminApplicationController::class, 'applications']);
        Route::get('/{id}', [AdminApplicationController::class, 'fetchApplication']);
        Route::post('update/{id}', [AdminApplicationController::class, 'update']);
        Route::delete('delete/{id}',  [AdminApplicationController::class, 'delete']);
    });
    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', [AdminUsersController::class, 'index'])->name('index');
        Route::get('/all', [AdminUsersController::class, 'getUsers']);
        Route::delete('delete/{id}',  [AdminUsersController::class, 'delete']);
    });
});


Route::group(['namespace' => 'User', 'middleware' => ['auth', 'user'], 'as' => 'user.'], function () {
    Route::get('/dashboard',  [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/certificate/preview', function () {
        $detail = Application::whereUserId(Auth::user()->id)->first();
        return view('include.certificate', ['detail' => $detail]);
    });
    Route::get('/application',  [DashboardController::class, 'getApplication']);
    Route::group(['prefix' => 'user'], function () {
        Route::group(['prefix' => 'application', 'as' => 'application.'], function () {
            Route::post('apply', [ApplicationController::class, 'store']);
            Route::post('apply/update/{id}', [ApplicationController::class, 'update']);
            Route::post('payment/confirm/{id}', [ApplicationController::class, 'confirmPayment']);
        });
    });
});

Auth::routes();
