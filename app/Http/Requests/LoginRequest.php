<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
      "name" => ["required"],
      "password" => ["required"],
    ];
  }
  public function messages()
  {
    return [
      "name.required" => "Nombre de usuario obligatorio",
      "password.required" => "Contraseña de usuario obligatoría",
    ];
  }
}
