<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Repositories\MessageRepository;
class MessageController extends Controller
{
  private $message;

   public function __construct(MessageRepository $message)
   {
     $this->message = $message;
   }

   public function getAllmessage()
   {  //message hanya bisa dilihat yg punya jadi cek id di token
     //$user_id = id di token
     //blm buat repositoryi untuk where
    //  $inbox = $this->message->getAll()->('receiver_id', $userid)
    //  $outbox =$this->message->getALL()->where('following_id', $user_id)
      return response()->json(compact('inbox','outbox'), 200);
   }


   public function getmessageDetail($message_id)
   {

     //cek token, id di token sama receiver_id atau sender_id sama?
     $message = $this->message->getById($message_id);
     return response()->json(compact('message'), 200);
   }

   public function storemessage($receiver_id,Request $request)
   {
     $attributes = $request->all();
     $attributes['receiver_id']=$receiver_id;
     //$attributes['sender_id'] = dari token
     $message =$this->message->create($attributes);
     return response()->json(compact('message'), 200);
   }

   public function updatemessage($message_id, Request $request)
   {
     $attributes = $request->all();
     $message = $this->message->update($message_id, $attributes);
     $message = $this->message->getById($message_id);

     return response()->json(compact('message'), 200);
   }

   public function deletemessage($message_id)
   {
     $message = $this->message->destroy($message_id);
     return response()->json(compact('message'), 200);
   }
}
