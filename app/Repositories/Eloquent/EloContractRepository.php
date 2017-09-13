<?php
namespace App\Repositories\Eloquent;
use App\Repositories\ContractRepository;
use App\Models\Contract;
class EloContractRepository implements ContractRepository {

  //   private $model;
  //
	// public function __construct(Contract $model)
	// {
	// 	$this->model = $model;
	// }

	public function getAll()
	{
		return Contract::all();
	}

	public function getById($id)
	{
		return Contract::findOrFail($id);
	}


	public function create(array $attributes)
	{

		return Contract::create($attributes);

	}

	public function update($id, array $attributes)
	{
		return Contract::find($id)->update($attributes);
	}


	public function destroy($id)
	{


    return Contract::findOrFail($id)->delete();

	}

	function where($att,$value)
	{
		return Contract::where($att,$value);
	}

}
