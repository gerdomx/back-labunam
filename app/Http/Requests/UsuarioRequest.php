<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsuarioRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    $rulesPassword = ["nullable"];

    if ($this->getMethod() === "POST") {
      $rulesPassword = ["required"];
    }

    return [
      "name" => ["required", Rule::unique("users")->ignore($this->id)],
      "password" => $rulesPassword,
      "rol" => ["required"],
    ];
  }
  public function messages()
  {
    return [
      "name.required" => "Nombre de usuario obligatorio",
      "name.unique" => "Nombre de usuario ya registrado",
      "password.required" => "Contraseña de usuario obligatoría",
      "rol.required" => "Rol de usuario obligatorío",
    ];
  }
}
