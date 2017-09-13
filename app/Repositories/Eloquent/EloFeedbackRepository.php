<?php
namespace App\Repositories\Eloquent;
use App\Repositories\FeedbackRepository;
use App\Models\Feedback;
class EloFeedbackRepository implements FeedbackRepository {

  //   private $model;
  //
	// public function __construct(Feedback $model)
	// {
	// 	$this->model = $model;
	// }

	public function getAll()
	{
		return Feedback::all();
	}

	public function getById($id)
	{
		return Feedback::findOrFail($id);
	}


	public function create(array $attributes)
	{

		return Feedback::create($attributes);

	}

	public function update($id, array $attributes)
	{
		return Feedback::find($id)->update($attributes);
	}


	public function destroy($id)
	{


    return Feedback::findOrFail($id)->delete();

	}

	function where($att,$value)
	{
		return Feedback::where($att,$value);
	}

}
