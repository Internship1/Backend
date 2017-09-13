<?php
namespace App\Repositories\Eloquent;
use App\Repositories\CommentRepository;
use App\Models\Comment;
class EloCommentRepository implements CommentRepository {

  //   private $model;
  //
	// public function __construct(Comment $model)
	// {
	// 	$this->model = $model;
	// }

	public function getAll()
	{
		return Comment::all();
	}

	public function getById($id)
	{
		return Comment::findOrFail($id);
	}


	public function create(array $attributes)
	{

		return Comment::create($attributes);

	}

	public function update($id, array $attributes)
	{
		return Comment::find($id)->update($attributes);
	}


	public function destroy($id)
	{


    return Comment::findOrFail($id)->delete();

	}

	function where($att,$value)
	{
		return  Comment::where($att,$value);
	}

}
