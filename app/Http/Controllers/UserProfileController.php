<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfile;
use App\Repositories\UserProfileRepository;
use JWTAuth;
use Request as token;
use Auth;

class UserProfileController extends Controller
{
  private $userprofile;

   public function __construct( UserProfileRepository $userprofile)
   {
     $this->userprofile = $userprofile;
   }

   public function getAllProfile()
   {
    //$usersprofile = $this->userprofile->getAll();
     $usersprofile = UserProfile::all();

      return response()->json(compact('usersprofile'), 200);
   }


   public function getProfileDetail($user_id)
   {
     $userprofile = $this->userprofile->getById($user_id);
    //$userprofile = UserProfile::find($user_id);
     return response()->json(compact('userprofile'), 200);
   }

   public function storeProfile(Request $request)
   {
//     $user = JWTAuth::parseToken()->authenticate();
       $user = token::instance()->id;
    $attributes = $request->only('address','contact');
    $attributes['user_id']=$user->id;
    $attributes['status']=1;
    $userprofile = Userprofile::create($attributes);

     return response()->json(compact('userprofile'), 200);
   }

   public function updateProfile($user_id, Request $request)
   {
       $attributes = $request->only('address','contact');
//       dd($attributes);
       $userprofile = $this->userprofile->update($user_id, $attributes);
       $userprofile = $this->userprofile->getById($user_id);
       
//       if($request->file('gambar') == "")
//        {
//            $katalog->gambar = $katalog->gambar;
//        } 
//        else
//        {
//            $file       = $request->file('gambar');
//            $fileName   = $file->getClientOriginalName();
//            $request->file('gambar')->move("images", $fileName);
//            $katalog->gambar = $fileName;
//        }
      
       //Hanya dapat mengedit profilenya sendiri
//       $user = Auth::user()->id;
       $user = token::instance()->id;
       if($user==$userprofile->user_id){
          return response()->json(compact('userprofile'), 200);
       }else{
           return Response()->json("Access Denied!",500);
       }
   }

   public function deleteProfile($id)
   {
     $userprofile = $this->userprofile->destroy($id);

     return response()->json(compact('userprofile'), 200);
   }

}
