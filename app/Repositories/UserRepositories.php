<?php

namespace App\Repositories;

use App\Models\User;

class UserRepositories extends  BaseRepository
{
  public function __construct(User $modelo)
  {
    parent::__construct($modelo);
  }
}
