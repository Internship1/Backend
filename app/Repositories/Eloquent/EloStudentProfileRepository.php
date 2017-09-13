<?php
namespace App\Repositories\Eloquent;
use App\Repositories\StudentProfileRepository;
use App\Models\StudentProfile;
class EloStudentProfileRepository implements StudentProfileRepository {

  //   private $model;
  //
	// public function __construct(StudentProfile $model)
	// {
	// 	$this->model = $model;
	// }

	public function getAll()
	{
		return StudentProfile::all();
	}

	public function getById($id)
	{
		return StudentProfile::find($id);
	}

	public function create(array $attributes)
	{
		return StudentProfile::create($attributes);
	}

	public function update($id, array $attributes)
	{
		return StudentProfile::find($id)->update($attributes);
	}

	public function destroy($id)
	{
    return StudentProfile::findOrFail($id)->delete();
	}

	function where($att,$value)
	{
		return StudentProfile::where($att,$value);
	}
	function getWith(array $function,$id)
	{
		return StudentProfile::with($function)->find($id);
	}
	function getAllWith(array $function)
	{
		return StudentProfile::with($function)->get();
	}

}
