<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterController;

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/', [CharacterController::class, 'index'])->name('characters.index');
Route::get('/characters/{id}', [CharacterController::class, 'show'])->name('characters.show');
