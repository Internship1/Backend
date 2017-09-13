<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentProfile;
use App\Repositories\StudentProfileRepository;

class StudentProfileController extends Controller
{
  private $studentprofile;

   public function __construct(StudentProfileRepository $studentprofile)
   {
     $this->studentprofile = $studentprofile;
   }

   public function getAllstudentprofile()
   {
       $studentprofiles = $this->studentprofile->getAllWith(['student','studentQualify']);
      return response()->json(compact('studentprofiles'), 200);
   }


   public function getstudentprofileDetail($student_id)
   {
     $studentprofile = $this->studentprofile->getWith(['student','studentQualify'],$student_id);
     return response()->json(compact('studentprofile'), 200);
   }

   public function storestudentprofile(Request $request)
   {
     $attributes = $request->only('description');
     $studentprofile =$this->studentprofile->create($attributes);
     return response()->json(compact('studentprofile'), 200);
   }

   public function updatestudentprofile($student_id,Request $request)
   {
     $attributes = $request->only('description');
     $studentprofile = $this->studentprofile->update($student_id, $attributes);
     $studentprofile = $this->studentprofile->getById($student_id);
     return response()->json(compact('studentprofile'), 200);
   }

   public function deletestudentprofile($student_id)
   {
     $studentprofile = $this->studentprofile->destroy($student_id);
     return response()->json(compact('studentprofile'), 200);
   }
}
