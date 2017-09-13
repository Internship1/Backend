<?php
namespace App\Repositories\Eloquent;
use App\Repositories\CompanyRepository;
use App\Models\Company;
class EloCompanyRepository implements CompanyRepository {

  //   private $model;
  //
	// public function __construct(Company $model)
	// {
	// 	$this->model = $model;
	// }

	public function getAll()
	{
		return Company::all();
	}

	public function getById($id)
	{
		return Company::findOrFail($id);
	}


	public function create(array $attributes)
	{

		return Company::create($attributes);

	}

	public function update($id, array $attributes)
	{
		return Company::find($id)->update($attributes);
	}


	public function destroy($id)
	{


    return Company::findOrFail($id)->delete();

	}

	function where($att,$value)
	{
		return Company::where($att,$value);
	}

}
