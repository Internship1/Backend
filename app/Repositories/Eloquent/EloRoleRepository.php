<?php
namespace App\Repositories\Eloquent;
use App\Repositories\RoleRepository;
use App\Models\Role;
class EloRoleRepository implements RoleRepository {

  //   private $model;
  //
	// public function __construct(Role $model)
	// {
	// 	$this->model = $model;
	// }

	public function getAll()
	{
		return Role::all();
	}

	public function getById($id)
	{
		return Role::findOrFail($id);
	}

	public function create(array $attributes)
	{
		return Role::create($attributes);
	}

	public function update($id, array $attributes)
	{
		return Role::find($id)->update($attributes);
	}

	public function destroy($id)
	{
    return Role::findOrFail($id)->delete();
	}

	function where($att,$value)
	{
		return Role::where($att,$value);
	}

}
