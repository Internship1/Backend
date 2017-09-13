<?php
namespace App\Repositories\Eloquent;
use App\Repositories\JobTypeTableRepository;
use App\Models\JobTypeTable;
class EloJobTypeTableRepository implements JobTypeTableRepository {

  //   private $model;
  //
	// public function __construct(JobTypeTable $model)
	// {
	// 	$this->model = $model;
	// }

	public function getAll()
	{
		return JobTypeTable::all();
	}

	public function getByCompositeId($firstId,$secondId)
	{
		return JobTypeTable::where('job_id',$firstId)->where('jobType_id',$secondId)->first();
	}

	public function create(array $attributes)
	{
		return JobTypeTable::create($attributes);
	}

	public function updateComposite($firstId,$secondId, array $attributes)
	{
		return JobTypeTable::where('job_id',$firstId)->where('jobType_id',$secondId)->first()-update($attributes);
	}

	public function destroyComposite($id)
	{
    return JobTypeTable::where('job_id',$firstId)->where('jobType_id',$secondId)->first()->delete();
	}

	function where($att,$value)
	{
		return JobTypeTable::where($att,$value);
	}

	function getWith(array $function,$id)
	{
		return JobTypeTable::with($function)->find($id);
	}
	function getAllWith(array $function)
	{
		return JobTypeTable::with($function)->get();
	}

}
