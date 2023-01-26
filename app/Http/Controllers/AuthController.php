<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  private $secretKey = 'labunam-system';

  public function __construct()
  {
    $this->middleware(['auth:sanctum'])->except(['login']);
  }

  public function login(LoginRequest $request)
  {
    $credenciales = $request->only("name", "password");
    if (!Auth::attempt($credenciales)) {
      return response(
        ["message" => "usuario y/o contraseña incorrectos"],
        401
      );
    }
    $user = User::find(Auth::user()->id);
    $token = $user->createToken($this->secretKey);
    return response()->json([
      "status" => true,
      "token" => $token->plainTextToken,
      "user" => $user->only(["id", "name", "rol"]),
    ]);
  }

  public function logout(Request $request)
  {
    $request->user()->currentAccessToken()->delete();
    return response()->json(["status" => true, "message" => "sesión cerrada exitosamente"]);
  }

  public function verificarAutenticacion(Request $request)
  {
    // eliminar token
    $request->user()->currentAccessToken()->delete();
    // renovar el token 
    $token = $request->user()->createToken($this->secretKey);
    return  response()->json([
      'status' => true,
      "token" => $token->plainTextToken,
      "user" => $request->user()->only(["id", "name", "rol"]),
    ]);
  }
}
