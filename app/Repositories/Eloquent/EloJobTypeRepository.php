<?php
namespace App\Repositories\Eloquent;
use App\Repositories\JobTypeRepository;
use App\Models\JobType;
class EloJobTypeRepository implements JobTypeRepository {

  //   private $model;
  //
	// public function __construct(JobType $model)
	// {
	// 	$this->model = $model;
	// }

	public function getAll()
	{
		return JobType::all();
	}

	public function getById($id)
	{
		return JobType::findOrFail($id);
	}

	public function create(array $attributes)
	{
		return JobType::create($attributes);
	}

	public function update($id, array $attributes)
	{
		return JobType::find($id)->update($attributes);
	}

	public function destroy($id)
	{
    return JobType::findOrFail($id)->delete();
	}

	function where($att,$value)
	{
		return JobType::where($att,$value);
	}

}
