<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invitation;
use App\Repositories\InvitationRepository;

class InvitationController extends Controller
{
  private $invitation;

   public function __construct(InvitationRepository $invitation)
   {
     $this->invitation = $invitation;
   }

   public function getAllinvitation()
   {
      $invitations = $this->invitation->getAll();
      return response()->json(compact('invitations'), 200);
   }


   public function getInvitationDetail($invitation_id)
   {
     $invitation = $this->invitation->getById($invitation_id);

     return response()->json(compact('invitation'), 200);
   }

   public function storeinvitation($job_id, $student_id,Request $request)
   {
     $attributes = $request->all();
     //cek token dulu apakah yg invite employer dan punya id job tersebut
     $attributes['student_id']=$student_id;
     $attributes['job_id']=$job_id;
     $invitation =$this->invitation->create($attributes);
     return response()->json(compact('invitation'), 200);
   }

   public function updateinvitation($invitation_id, Request $request)
   {
     $attributes = $request->all();
     $invitation = $this->invitation->update($invitation_id, $attributes);
     $invitation = $this->invitation->getById($invitation_id);

     return response()->json(compact('invitation'), 200);
   }

   public function deleteinvitation($invitation_id)
   {
     $invitation = $this->invitation->destroy($invitation_id);
     return response()->json(compact('invitation'), 200);
   }

}
