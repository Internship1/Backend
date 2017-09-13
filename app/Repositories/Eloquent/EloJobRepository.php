<?php
namespace App\Repositories\Eloquent;
use App\Repositories\JobRepository;
use App\Models\Job;
class EloJobRepository implements JobRepository {

  //   private $model;
  //
	// public function __construct(Job $model)
	// {
	// 	$this->model = $model;
	// }

	public function getAll()
	{
		return Job::all();
	}

	public function getById($id)
	{
		return Job::find($id);
	}

	public function create(array $attributes)
	{
		return Job::create($attributes);
	}

	public function update($id, array $attributes)
	{
		return Job::find($id)->update($attributes);
	}

	public function destroy($id)
	{
    return Job::findOrFail($id)->delete();
	}

	function where($att,$value)
	{
		return Job::where($att,$value);
	}
	function getWith(array $function,$id)
	{
		return Job::with($function)->find($id);
	}
	function getAllWith(array $function)
	{
		return Job::with($function)->get();
	}

}
