<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qualify;
use App\Repositories\QualifyRepository;

class QualifyController extends Controller
{
  private $qualify;

   public function __construct(QualifyRepository $qualify)
   {
     $this->qualify = $qualify;
   }

   public function getAllqualify()
   {
      $qualifies = $this->qualify->getAll();
      return response()->json(compact('qualifies'), 200);
   }


   public function getqualifyDetail($qualify_id)
   {
     $qualify = $this->qualify->getById($qualify_id);

     return response()->json(compact('qualify'), 200);
   }

   public function storequalify($qualify_id)
   {
     $qualify =$this->qualify->create($attributes);
     return response()->json(compact('qualify'), 200);
   }

   public function updatequalify($qualify_id)
   {
     $attributes = $request->all();
     $qualify = $this->qualify->update($qualify_id, $attributes);
     $qualify = $this->qualify->getById($qualify_id);
     return response()->json(compact('qualify'), 200);
   }

   public function deletequalify($qualify_id)
   {
     $qualify = $this->qualify->destroy($qualify_id);
     return response()->json(compact('qualify'), 200);
   }
}
