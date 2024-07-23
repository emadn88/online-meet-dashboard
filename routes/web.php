<?php

use Illuminate\Support\Facades\Route;

Route::get('/',[\App\Http\Controllers\IndexController::class,'index']);
Route::post('create-room',[\App\Http\Controllers\IndexController::class,'createRoom'])->name('create-room');
Route::get('enter-room/{room}',[\App\Http\Controllers\IndexController::class,'enterRoom'])->name('enter-room');
Route::post('enter-room-post/{room}',[\App\Http\Controllers\IndexController::class,'enterRoomPost'])->name('enter-room-post');

Route::post('/room/{id}/delete', [\App\Http\Controllers\IndexController::class,'delete'])->name('room.delete');
Route::post('/room/{id}/toggle', [\App\Http\Controllers\IndexController::class,'toggleStatus'])->name('room.toggle');
