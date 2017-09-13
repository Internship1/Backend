<?php
namespace App\Repositories\Eloquent;
use App\Repositories\ApplyRepository;
use App\Models\Apply;
class EloApplyRepository implements ApplyRepository {

  //   private $model;
  //
	// public function __construct(Apply $model)
	// {
	// 	$this->model = $model;
	// }

	public function getAll()
	{
		return Apply::all();
	}

	public function getById($id)
	{
		return Apply::findOrFail($id);
	}


	public function create(array $attributes)
	{

		return Apply::create($attributes);

	}

	public function update($id, array $attributes)
	{
		return Apply::find($id)->update($attributes);
	}


	public function destroy($id)
	{


    return Apply::findOrFail($id)->delete();

	}

  function where($att,$value)
	{
		return Apply::where($att,$value);
	}

}
