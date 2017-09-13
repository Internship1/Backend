<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Repositories\PostRepository;

class PostController extends Controller
{
  private $post;

   public function __construct(PostRepository $post)
   {
     $this->post = $post;
   }

   public function getAllpost()
   {
      $posts = $this->post->getAll();
      return response()->json(compact('posts'), 200);
   }


   public function getpostDetail($post_id)
   {
     $post = $this->post->getById($post_id);

     return response()->json(compact('post'), 200);
   }

   public function storepost(Request $request)
   {
     $attributes = $request->all();
     //user_id dari token;
     $post =$this->post->create($attributes);
     return response()->json(compact('post'), 200);
   }

   public function updatepost($post_id, Request $request)
   { //cek, post is == id di token?
     $attributes = $request->all();
     $post = $this->post->update($post_id, $attributes);
     $post = $this->post->getById($post_id);

     return response()->json(compact('post'), 200);
   }

   public function deletepost($post_id)
   {
     $post = $this->post->destroy($post_id);
     return response()->json(compact('post'), 200);
   }

   public function countPostLove($post_id)
   {
     $post = $this->post->getById($post_id);
     $love_number = $post->love->get()->count();
     return response()->json(compact('love_number'), 200);
   }

   public function getPostComments($post_id)
   {
     $post = $this->post->getById($post_id);
     $comments = $post->comment()->get();
     return response()->json(compact('comments'), 200);
   }

   public function getUserPosts($user_id)
   {
       $post = $this->post->getById($post_id);
       $user = $post->user()->first();

    //  return response()->json(compact(''), 200);
   }
}
