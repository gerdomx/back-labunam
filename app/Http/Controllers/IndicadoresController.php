<?php

namespace App\Http\Controllers;

use App\Models\Indicador;
use Illuminate\Http\Request;

class IndicadoresController extends Controller
{

    public function __construct()
    {
      //$this->middleware(['auth:sanctum']);
    }
  

    public function getIndicador($uuid)
    {
        $item = Indicador::where("uuid", $uuid)->first();
        return response()->json([
            'status' => true,
            'item' => $item
          ]);
        return $item;
    }
}
