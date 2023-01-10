<?php

namespace App\Factories;

use Illuminate\Database\Eloquent\Model;

class BaseFactory
{
  protected $model;

  public function __construct(Model $model)
  {
    $this->model = $model;
  }

  public function createItem($item)
  {
    if ($item === null) {
      $item = new $this->model();
    }
    return $item;
  }
}
