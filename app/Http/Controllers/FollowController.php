<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
use App\Repositories\FollowRepository;

class FollowController extends Controller
{
  private $follow;

   public function __construct(FollowRepository $follow)
   {
     $this->follow = $follow;
   }

   public function getAllfollow()
   {
      $follows = $this->follow->getAll();
      return response()->json(compact('follows'), 200);
   }


   public function getfollowDetail($follow_id)
   {
     $follow = $this->follow->getById($follow_id);

     return response()->json(compact('follow'), 200);
   }

   public function storefollow($followable_id)
   {
     //$attributes['following_id'] = dari token
     $attributes['followable_id']=$followable_id;
     $follow =$this->follow->create($attributes);
     return response()->json(compact('follow'), 200);
   }

  //  public function updatefollow($follow_id)
  //  {
  //    $attributes = $request->all();
  //    $follow = $this->follow->update($follow_id, $attributes);
  //    $follow = $this->follow->getById($follow_id);
   //
  //    return response()->json(compact('follow'), 200);
  //  }

   public function deletefollow($follow_id)
   { //cek dulu following_id == id token
     $follow = $this->follow->destroy($follow_id);
     return response()->json(compact('follow'), 200);
   }
}
