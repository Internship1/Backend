<?php
namespace App\Repositories\Eloquent;
use App\Repositories\QualifyRepository;
use App\Models\Qualify;
class EloQualifyRepository implements QualifyRepository {

  //   private $model;
  //
	// public function __construct(Qualify $model)
	// {
	// 	$this->model = $model;
	// }

	public function getAll()
	{
		return Qualify::all();
	}

	public function getById($id)
	{
		return Qualify::findOrFail($id);
	}

	public function create(array $attributes)
	{
		return Qualify::create($attributes);
	}

	public function update($id, array $attributes)
	{
		return Qualify::find($id)->update($attributes);
	}

	public function destroy($id)
	{
    return Qualify::findOrFail($id)->delete();
	}

	function where($att,$value)
	{
		return Qualify::where($att,$value);
	}

}
