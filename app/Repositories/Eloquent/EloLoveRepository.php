<?php
namespace App\Repositories\Eloquent;
use App\Repositories\LoveRepository;
use App\Models\Love;
class EloLoveRepository implements LoveRepository {

  //   private $model;
  //
	// public function __construct(Love $model)
	// {
	// 	$this->model = $model;
	// }

	public function getAll()
	{
		return Love::all();
	}

	public function getById($id)
	{
		return Love::findOrFail($id);
	}

	public function create(array $attributes)
	{
		return Love::create($attributes);
	}

	public function update($id, array $attributes)
	{
		return Love::find($id)->update($attributes);
	}

	public function destroy($id)
	{
    return Love::findOrFail($id)->delete();
	}

	function where($att,$value)
	{
		return Love::where($att,$value);
	}

}
