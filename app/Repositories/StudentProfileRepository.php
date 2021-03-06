<?php
namespace App\Repositories;
interface StudentProfileRepository {

  function getAll();

	function getById($id);

	function create(array $attributes);

	function update($id, array $attributes);

	function destroy($id);
  function where($att,$value);
  function getWith(array $function,$id);
  function getAllWith(array $function);

}
