<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
  protected $model;

  public function __construct(Model $model)
  {
    $this->model = $model;
  }

  public function all()
  {
    $query = "";
    if (request('query') != "") {
      $query = request('query');
      $items = $this->model::search($query)->paginate(5);
    } else {
      $items = $this->model::paginate(5);
    }
    return $items;
  }

  public function get(int $id)
  {
    return $this->model->find($id);
  }

  public function save(Model $model)
  {
    $model->save();
    return $model;
  }

  public function delete(Model $model)
  {
    $model->delete();
    return $model;
  }
}
