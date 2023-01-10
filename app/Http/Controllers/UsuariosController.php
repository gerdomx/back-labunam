<?php

namespace App\Http\Controllers;

use App\Factories\UserFactory;
use App\Http\Requests\UsuarioRequest;
use App\Models\User;
use App\Repositories\UserRepositories;

class UsuariosController extends Controller
{
  private $repository;
  private $factory;

  public function __construct(UserRepositories $repository, UserFactory $factory)
  {
    $this->middleware(['auth:sanctum']);
    $this->repository = $repository;
    $this->factory = $factory;
  }

  public function usuarios()
  {
    $items = $this->repository->all();
    return response()->json([
      'status' => true,
      'items' => $items
    ]);
  }
  public function getUser(User $user)
  {
    $item =  $this->repository->get($user->id);
    return response()->json([
      'status' => true,
      'item' => $item
    ]);
  }

  public function store(UsuarioRequest $request)
  {
    $instance = $this->factory->createInstance($request);
    $item =  $this->repository->save($instance);
    return response()->json([
      'status' => true,
      'item' => $item
    ]);
  }
  public function update(UsuarioRequest $request, User $user)
  {
    $instance = $this->factory->createInstance($request, $user);
    $item =  $this->repository->save($instance);
    return response()->json([
      'status' => true,
      'item' => $item
    ]);
  }

  public function delete(User $user)
  {
    $item = $user;
    $item =  $this->repository->delete($item);
    return response()->json([
      'status' => true,
      'item' => $item
    ]);
  }
}
