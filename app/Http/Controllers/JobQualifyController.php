<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobQualify;
use App\Repositories\JobQualifyRepository;

class JobQualifyController extends Controller
{
  private $jobqualify;

   public function __construct(JobQualifyRepository $jobqualify)
   {
     $this->jobqualify = $jobqualify;
   }

   public function getAlljobqualify()
   {
      $jobqualifies = $this->jobqualify->getAll();
      return response()->json(compact('jobqualifies'), 200);
   }


   public function getjobqualifyDetail($jobqualify_id)
   {
     $jobqualify = $this->jobqualify->getById($jobqualify_id);

     return response()->json(compact('jobqualify'), 200);
   }

   public function storejobqualify($jobqualifyable_id)
   {
     $jobqualify =$this->jobqualify->create($attributes);
     return response()->json(compact('jobqualify'), 200);
   }

   public function updatejobqualify($jobqualify_id)
   {
     $attributes = $request->all();
     $jobqualify = $this->jobqualify->update($jobqualify_id, $attributes);
     $jobqualify = $this->jobqualify->getById($jobqualify_id);
     return response()->json(compact('jobqualify'), 200);
   }

   public function deletejobqualify($jobqualify_id)
   {
     $jobqualify = $this->jobqualify->destroy($jobqualify_id);
     return response()->json(compact('jobqualify'), 200);
   }
}
