<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentQualify;
use App\Repositories\StudentQualifyRepository;

class StudentQualifyController extends Controller
{
  private $studentqualify;

   public function __construct(StudentQualifyRepository $studentqualify)
   {
     $this->studentqualify = $studentqualify;
   }

   public function getAllstudentqualify()
   {
      $studentqualifys = $this->studentqualify->getAll();
      return response()->json(compact('studentqualifys'), 200);
   }


   public function getstudentqualifyDetail($studentqualify_id)
   {
     $studentqualify = $this->studentqualify->getById($studentqualify_id);

     return response()->json(compact('studentqualify'), 200);
   }

   public function storestudentqualify($studentqualifyable_id)
   {
     $studentqualify =$this->studentqualify->create($attributes);
     return response()->json(compact('studentqualify'), 200);
   }

   public function updatestudentqualify($studentqualify_id)
   {
     $attributes = $request->all();
     $studentqualify = $this->studentqualify->update($studentqualify_id, $attributes);
     $studentqualify = $this->studentqualify->getById($studentqualify_id);
     return response()->json(compact('studentqualify'), 200);
   }

   public function deletestudentqualify($studentqualify_id)
   {
     $studentqualify = $this->studentqualify->destroy($studentqualify_id);
     return response()->json(compact('studentqualify'), 200);
   }
}
