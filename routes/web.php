<?php

use Illuminate\Support\Facades\Route;

Route::get('/',[\App\Http\Controllers\IndexController::class,'index']);
Route::post('create-room',[\App\Http\Controllers\IndexController::class,'createRoom'])->name('create-room');
Route::get('enter-room/{room}',[\App\Http\Controllers\IndexController::class,'enterRoom'])->name('enter-room');
Route::post('enter-room-post/{room}',[\App\Http\Controllers\IndexController::class,'enterRoomPost'])->name('enter-room-post');
