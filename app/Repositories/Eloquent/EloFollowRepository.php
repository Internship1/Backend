<?php
namespace App\Repositories\Eloquent;
use App\Repositories\FollowRepository;
use App\Models\Follow;
class EloFollowRepository implements FollowRepository {

  //   private $model;
  //
	// public function __construct(Follow $model)
	// {
	// 	$this->model = $model;
	// }

	public function getAll()
	{
		return Follow::all();
	}

	public function getById($id)
	{
		return Follow::findOrFail($id);
	}


	public function create(array $attributes)
	{

		return Follow::create($attributes);

	}

	public function update($id, array $attributes)
	{
		return Follow::find($id)->update($attributes);
	}


	public function destroy($id)
	{

    return Follow::findOrFail($id)->delete();

	}

	function where($att,$value)
	{
		return Follow::where($att,$value);
	}

}
