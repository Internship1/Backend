<?php
namespace App\Repositories\Eloquent;
use App\Repositories\MessageRepository;
use App\Models\Message;
class EloMessageRepository implements MessageRepository {

  //   private $model;
  //
	// public function __construct(Message $model)
	// {
	// 	$this->model = $model;
	// }

	public function getAll()
	{
		return Message::all();
	}

	public function getById($id)
	{
		return Message::findOrFail($id);
	}

	public function create(array $attributes)
	{
		return Message::create($attributes);
	}

	public function update($id, array $attributes)
	{
		return Message::find($id)->update($attributes);
	}

	public function destroy($id)
	{
    return Message::findOrFail($id)->delete();
	}

	function where($att,$value)
	{
		return Message::where($att,$value);
	}

}
