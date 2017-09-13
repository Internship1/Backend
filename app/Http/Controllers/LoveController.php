<?php

namespace App\Http\Controllers;

use Request;
use App\Models\Love;
use App\Repositories\LoveRepository;

class LoveController extends Controller
{
  private $love;

   public function __construct(LoveRepository $love)
   {
     $this->love = $love;
   }

   public function getAlllove())
   {
      $loves = $this->love->getAll();
      return response()->json(compact('loves'), 200);
   }


   public function getloveDetail($love_id)
   {
     $love = $this->love->getById($love_id);

     return response()->json(compact('love'), 200);
   }

   public function storelove($post_id)
   {
     $attributes['user_id'] = Request::instance()->id;

    //cek sebelumnya pernah love g? kalo udah g usah create lagi..

     $attributes['post_id'] = $post_id;
     $love =$this->love->create($attributes);
     return response()->json(compact('love'), 200);
   }

  //  public function updatelove($love_id, Request $request)
  //  {
  //    $attributes = $request->all();
  //    $love = $this->love->update($love_id, $attributes);
  //    $love = $this->love->getById($love_id);
   //
  //    return response()->json(compact('love'), 200);
  //  }

   public function deletelove($love_id)
   {// cek token dulu, yg id di token sama dengan id yg punya love??
    // $id=Request::instance()->id;
     $love = $this->love->destroy($love_id);
     return response()->json(compact('love'), 200);
   }
}
