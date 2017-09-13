<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Repositories\CommentRepository;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private $comment;

   public function __construct(CommentRepository $comment)
   {
     $this->comment = $comment;
   }

   public function getAllcomment()
   {
      $comments = $this->comment->getAll();
      return response()->json(compact('comments'), 200);
   }


   public function getcommentDetail($comment_id)
   {
     $comment = $this->comment->getById($comment_id);

     return response()->json(compact('comment'), 200);
   }

   public function storecomment($post_id,Request $request)
   {
     $attributes = $request->all();
     $attributes['post_id']=$post_id;
    // $attributes['user_id']=  ambil dari token
    //
     $comment =$this->comment->create($attributes);
     return response()->json(compact('comment'), 200);
   }

   public function updatecomment($comment_id, Request $request)
   {  //cek user_id sama dengan yg ditoken?
     $attributes = $request->all();
     $comment = $this->comment->update($comment_id, $attributes);
     $comment = $this->comment->getById($comment_id);

     return response()->json(compact('comment'), 200);
   }

   public function deletecomment($comment_id)
   {
     $comment = $this->comment->destroy($comment_id);
     return response()->json(compact('comment'), 200);
   }
}
