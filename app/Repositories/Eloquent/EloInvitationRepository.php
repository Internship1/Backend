<?php
namespace App\Repositories\Eloquent;
use App\Repositories\InvitationRepository;
use App\Models\Invitation;
class EloInvitationRepository implements InvitationRepository {

  //   private $model;
  //
	// public function __construct(Invitation $model)
	// {
	// 	$this->model = $model;
	// }

	public function getAll()
	{
		return Invitation::all();
	}

	public function getById($id)
	{
		return Invitation::findOrFail($id);
	}

	public function create(array $attributes)
	{
		return Invitation::create($attributes);
	}

	public function update($id, array $attributes)
	{
		return Invitation::find($id)->update($attributes);
	}

	public function destroy($id)
	{
    return Invitation::findOrFail($id)->delete();
	}

	function where($att,$value)
	{
		return Invitation::where($att,$value);
	}

}
