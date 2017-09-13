<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobTypeTable;
use App\Repositories\JobTypeTableRepository;

class JobTypeTableController extends Controller
{
  private $jobtypetable;

   public function __construct(JobTypeTableRepository $jobtypetable)
   {
     $this->jobtypetable = $jobtypetable;
   }

   public function getAlljobtypetable()
   {
      $jobtypetables = $this->jobtypetable->getAll();
      return response()->json(compact('jobtypetables'), 200);
   }


   public function getjobtypetableDetail($job_id,$type_id)
   {
     $jobtypetable = $this->jobtypetable->getByCompositeId($job_id,$type_id);

     return response()->json(compact('jobtypetable'), 200);
   }

   public function storejobtypetable(Request $request)
   { $attributes = $request->only('job_id','jobType_id');
     $jobtypetable =$this->jobtypetable->create($attributes);
     return response()->json(compact('jobtypetable'), 200);
   }

   public function updatejobtypetable($jobtypetable_id)
   {
     $attributes = $request->all();
     $jobtypetable = $this->jobtypetable->update($jobtypetable_id, $attributes);
     $jobtypetable = $this->jobtypetable->getById($jobtypetable_id);
     return response()->json(compact('jobtypetable'), 200);
   }

   public function deletejobtypetable($jobtypetable_id)
   {
     $jobtypetable = $this->jobtypetable->destroy($jobtypetable_id);
     return response()->json(compact('jobtypetable'), 200);
   }
}
