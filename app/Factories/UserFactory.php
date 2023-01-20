<?php

namespace App\Factories;

use App\Factories\BaseFactory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserFactory extends BaseFactory
{
  public function __construct(User $user)
  {
    parent::__construct($user);
  }
  public function createInstance(Request $data, $user = null): User
  {
    $item = $this->createItem($user);
    $item->name = $data->name;
    $item->rol = $data->rol;
    if (!empty($data->password)) {
      $item->password = Hash::make($data->password);
    }
    return $item;
  }
}
