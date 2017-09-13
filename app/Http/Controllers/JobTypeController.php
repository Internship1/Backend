<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobType;
use App\Repositories\JobTypeRepository;

class JobTypeController extends Controller
{
  private $jobtype;

   public function __construct(JobTypeRepository $jobtype)
   {
     $this->jobtype = $jobtype;
   }

   public function getAlljobtype()
   {
      $jobtypes = $this->jobtype->getAll();
      return response()->json(compact('jobtypes'), 200);
   }


   public function getjobtypeDetail($jobtype_id)
   {
     $jobtype = $this->jobtype->getById($jobtype_id);

     return response()->json(compact('jobtype'), 200);
   }

   public function storejobtype(Request $request)
   {
     $attributes = $request->only('type_name');
     $jobtype =$this->jobtype->create($attributes);
     return response()->json(compact('jobtype'), 200);
   }

   public function updatejobtype($jobtype_id)
   {
     $attributes = $request->all();
     $jobtype = $this->jobtype->update($jobtype_id, $attributes);
     $jobtype = $this->jobtype->getById($jobtype_id);
     return response()->json(compact('jobtype'), 200);
   }

   public function deletejobtype($jobtype_id)
   {
     $jobtype = $this->jobtype->destroy($jobtype_id);
     return response()->json(compact('jobtype'), 200);
   }
}
