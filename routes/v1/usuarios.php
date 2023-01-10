<?php

use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;


Route::controller(UsuariosController::class)->group(function () {
  Route::get('/', 'usuarios');
  Route::get('/get/{user}', 'getUser');
  Route::post('/store', 'store');
  Route::put('/update/{user}', 'update');
  Route::delete('/delete/{user}', 'delete');
});
