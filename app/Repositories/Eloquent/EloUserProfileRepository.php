<?php
namespace App\Repositories\Eloquent;
use App\Repositories\UserProfileRepository;
use App\Models\UserProfile;
class EloUserProfileRepository implements UserProfileRepository {

  //   private $model;
  //
	// public function __construct(UserProfile $model)
	// {
	// 	$this->model = $model;
	// }

	public function getAll()
	{
		return UserProfile::all();
	}

	public function getById($id)
	{
		return UserProfile::findOrFail($id);
	}

	public function create(array $attributes)
	{
		return UserProfile::create($attributes);
	}

	public function update($id, array $attributes)
	{
		return UserProfile::find($id)->update($attributes);
	}

	public function destroy($id)
	{
    return UserProfile::find($id)->delete();
	}

	function where($att,$value)
	{
		return UserProfile::where($att,$value);
	}
	function with($function)
	{
		return UserProfile::with($function);
	}

}
