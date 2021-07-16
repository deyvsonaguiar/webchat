<?php

use App\Http\Controllers\api\MessageController;
use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

    Route::get('/messages/{user}', [MessageController::class, 'listMessages'])->name('message.listMessages');
    Route::post('/messages/store', [MessageController::class, 'store'])->name('message.store');

});
