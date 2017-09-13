<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Repositories\RoleRepository;

class RoleController extends Controller
{
  private $role;

  public function __construct(roleRepository $role)
  {
    $this->role = $role;
  }

  public function getAllroles($id = Null)
  {
     $roles = $this->role->getAll();
     return response()->json(compact('roles'), 200);
  }


  public function getrole($id)
  {
    $role = $this->role->getById($id);

    return response()->json(compact('role'), 200);
  }

  public function storerole(Request $request)
  {
     $attributes = $request->all();
    $apply =$this->article->create($attributes);
    return response()->json(compact('role'), 200);
  }

  public function updaterole($id, Request $request)
  {
    $attributes = $request->all();
    $role = $this->role->update($id, $attributes);
    $role = $this->role->getById($id);

    return response()->json(compact('role'), 200);
  }

  public function deleteRole($id)
  {
    $role = $this->role->destroy($id);

    return response()->json(compact('role'), 200);
  }
}
