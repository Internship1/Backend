<?php
namespace App\Repositories\Eloquent;
use App\Repositories\PostRepository;
use App\Models\Post;
class EloPostRepository implements PostRepository {

  //   private $model;
  //
	// public function __construct(Post $model)
	// {
	// 	$this->model = $model;
	// }

	public function getAll()
	{
		return Post::all();
	}

	public function getById($id)
	{
		return Post::findOrFail($id);
	}

	public function create(array $attributes)
	{
		return Post::create($attributes);
	}

	public function update($id, array $attributes)
	{
		return Post::find($id)->update($attributes);
	}

	public function destroy($id)
	{
    return Post::findOrFail($id)->delete();
	}

	function where($att,$value)
	{
		return Post::where($att,$value);
	}

}
