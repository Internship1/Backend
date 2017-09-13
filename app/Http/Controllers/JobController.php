<?php

namespace App\Http\Controllers;

use Request as Token;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Repositories\JobRepository;
class JobController extends Controller
{
  private $job;

   public function __construct(JobRepository $job)
   {
     $this->job = $job;
   }

   public function getAlljob()
   {
      $jobs = $this->job->getAllWith(['employer.company','jobTypeTable.jobType','jobQualify.Qualify']);
      return response()->json(compact('jobs'), 200);
   }


   public function getJobDetail($job_id)
   {
     //$job = $this->job->getById($job_id);
     $job = $this->job->getWith(['employer.company','jobTypeTable.jobType','jobQualify.Qualify'],$job_id);

     return response()->json(compact('job'), 200);
   }

   public function storeJob(Request $request)
   {
     $id_token = Token::instance()->id;
     $attributes = $request->only('job_description','job_facilities','job_position');
     $attributes['employer_id'] = $id_token;
     $attributes['job_status'] = 1;
     $job =$this->job->create($attributes);
     return response()->json(compact('job'), 200);
   }

   public function updatejob($job_id, Request $request)
   {//  cek dulu, bnr yg punya job?
     $id_token = Token::instance()->id;
     $job = $this->job->getById($job_id);
     if($id_token == $job->employer_id)
     {
     $attributes = $request->all();
     $job = $this->job->update($job_id, $attributes);
     $job = $this->job->getById($job_id);
     return response()->json(compact('job'), 200);
      }
      else
      {
        return response()->json('bukan yg punya job', 200);
      }
   }

   public function deletejob($job_id)
   {//cek dulu, bnr yg punya job?
     $id_token = Token::instance()->id;
     $is_admin = Token::instance()->role;
     $job = $this->job->getById($job_id);
     if($id_token == $job->employer_id || $is_admin == 3)
      {
       $job = $this->job->destroy($job_id);
       return response()->json(compact('job'), 200);
      }
     else
      {
        return response()->json('error', 200);
      }
   }

   public function getJobStudents($job_id)
   {
     $job = $this->job->getById($job_id);

     return response()->json(compact('job'), 200);
   }

   public function getJobApplies($job_id)
   {
      $job = $this->job->getById($job_id);
      $applies = $job->apply()->get();
      return response()->json(compact('applies'), 200);
   }



}
