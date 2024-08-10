<?php

use Illuminate\Support\Facades\Route;

Route::get('/',[\App\Http\Controllers\IndexController::class,'index']);
Route::post('create-room',[\App\Http\Controllers\IndexController::class,'createRoom'])->name('create-room');
Route::get('join/{room}',[\App\Http\Controllers\IndexController::class,'enterRoom'])->name('enter-room');
Route::get('enter-room2/{room}',[\App\Http\Controllers\IndexController::class,'enterRoom'])->name('enter-room2');
Route::post('enter-room-post/{room}',[\App\Http\Controllers\IndexController::class,'enterRoomPost'])->name('enter-room-post');

Route::post('/room/{id}/delete', [\App\Http\Controllers\IndexController::class,'delete'])->name('room.delete');
Route::post('/room/{id}/toggle', [\App\Http\Controllers\IndexController::class,'toggleStatus'])->name('room.toggle');
Route::get('test',[\App\Http\Controllers\IndexController::class,'test']);
Route::post('check-room',[\App\Http\Controllers\IndexController::class,'checkRoom']);
