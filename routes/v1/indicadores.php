<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndicadoresController;

Route::controller(IndicadoresController::class)->group(function () {  
  Route::get('/{uuid}', 'getIndicador');
});
