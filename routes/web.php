<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('admin.layouts.main');
})->name('admin.layouts.main');

Route::group([
    'prefix' => 'admin'
], function () {
    Route::group([
        'prefix' => 'room'
    ], function () {
        Route::get('/index', [RoomController::class, 'showIndex'])->name('room.showIndex');
        Route::get('/create', [RoomController::class, 'showCreate'])->name('room.showCreate');
        Route::post('/', [RoomController::class, 'postCreate'])->name('room.showStore');
        Route::get('/update/{room}', [RoomController::class, 'showUpdate'])->name('room.showUpdate');
        Route::post('/save/{room}', [RoomController::class, 'postUpdate'])->name('room.showSave');
        Route::get('/destroy/{room}', [RoomController::class, 'destroy'])->name('room.destroy');
    });
    Route::group([
        'prefix' => 'room_type'
    ], function () {
        Route::get('/index', [RoomTypeController::class, 'showIndex'])->name('room_type.showIndex');
        Route::get('/create', [RoomTypeController::class, 'showCreate'])->name('room_type.showCreate');
        Route::post('/', [RoomTypeController::class, 'showStore'])->name('room_type.showStore');
        Route::get('/update/{room_type}', [RoomTypeController::class, 'showUpdate'])->name('room_type.showUpdate');
        Route::post('/save/{room_type}', [RoomTypeController::class, 'showSave'])->name('room_type.showSave');
        Route::get('/destroy/{room_type}', [RoomTypeController::class, 'destroy'])->name('room_type.destroy');
    });
    Route::group([
        'prefix' => 'booking'
    ], function () {
        Route::get('/index', [BookingController::class, 'showIndex'])->name('booking.showIndex');
        Route::get('/create', [BookingController::class, 'showCreate'])->name('booking.showCreate');
        Route::get('/update/{booking}', [BookingController::class, 'showUpdate'])->name('booking.showUpdate');

        Route::post('/update/{booking}', [BookingController::class, 'postUpdate'])->name('booking.postUpdate');
    });
    Route::group([
        'prefix' => 'transaction'
    ], function () {
        Route::get('/index', [TransactionController::class, 'showIndex'])->name('transaction.showIndex');
        Route::get('/create', [TransactionController::class, 'showCreate'])->name('transaction.showCreate');
        Route::get('/update', [TransactionController::class, 'showUpdate'])->name('transaction.showUpdate');
    });
    Route::group([
        'prefix' => 'user'
    ], function () {
        Route::get('/index', [UserController::class, 'showIndex'])->name('user.showIndex');
        Route::get('/create', [UserController::class, 'showCreate'])->name('user.showCreate');
        Route::get('/update', [UserController::class, 'showUpdate'])->name('user.showUpdate');
    });
});

Route::group([
    'prefix' => 'customer'
], function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('customer.showLogin');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('customer.showRegister');
    Route::get('/index', [IndexController::class, 'showIndex'])->name('customer.showIndex');
    Route::get('/about', [IndexController::class, 'showAbout'])->name('customer.showAbout');
    Route::get('/room', [IndexController::class, 'showRoom'])->name('customer.showRoom');
    Route::get('/contact', [IndexController::class, 'showContact'])->name('customer.showContact');
    Route::get('/service', [IndexController::class, 'showService'])->name('customer.showService');
    Route::get('/booking', [IndexController::class, 'showBooking'])->name('customer.showBooking')->middleware('auth');
    Route::get('/your-booking', [IndexController::class, 'showYourBooking'])->name('customer.showYourBooking')->middleware('auth');

    Route::post('/register', [AuthController::class, 'postRegister'])->name('customer.postRegister');
    Route::post('/login', [AuthController::class, 'postLogin'])->name('customer.postLogin');
    Route::get('/logout', [AuthController::class, 'postLogout'])->name('customer.postLogout');

    Route::post('/booking', [IndexController::class, 'postBooking'])->name('customer.postBooking')->middleware('auth');
});
