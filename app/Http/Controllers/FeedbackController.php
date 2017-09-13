<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Repositories\FeedbackRepository;
class FeedbackController extends Controller
{
  private $feedback;

   public function __construct(FeedbackRepository $feedback)
   {
     $this->feedback = $feedback;
   }

   public function getAllfeedback()
   {
      $feedbacks = $this->feedback->getAll();
      return response()->json(compact('feedbacks'), 200);
   }


   public function getfeedbackDetail($contract_id)
   {
     $feedback = $this->feedback->getById($contract_id);

     return response()->json(compact('feedback'), 200);
   }

   public function storefeedback($contract_id,Request $request)
   {
     $attributes = $request->all();
     $attributes['contract_id']=$contract_id;
     $feedback =$this->feedback->create($attributes);
     return response()->json(compact('feedback'), 200);
   }

   public function updatefeedback($attributes, Request $request)
   {
     $attributes = $request->all();
     $feedback = $this->feedback->update($contract_id, $attributes);
     $feedback = $this->feedback->getById($contract_id);

     return response()->json(compact('feedback'), 200);
   }

   public function deletefeedback($contract_id)
   {
     $feedback = $this->feedback->destroy($contract_id);
     return response()->json(compact('feedback'), 200);
   }

}
