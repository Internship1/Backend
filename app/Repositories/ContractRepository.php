<?php
namespace App\Repositories;
interface ContractRepository {

  function getAll();

	function getById($id);

	function create(array $attributes);

	function update($id, array $attributes);

	function destroy($id);

  function where($att,$value);
}
