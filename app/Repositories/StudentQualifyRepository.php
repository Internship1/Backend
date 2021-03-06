<?php
namespace App\Repositories;
interface StudentQualifyRepository {

  function getAll();

  function getByCompositeId($firstId,$secondId);

  function create(array $attributes);

  function updateComposite($firstId,$secondId, array $attributes);

  function destroyComposite($firstId,$secondId);
  function where($att,$value);

}
