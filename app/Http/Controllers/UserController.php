<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\UserRepository;
//karena g bisa kalau sama namanya,makanya diganti jadi reques
use Request as token;
use Illuminate\Http\Request;

class UserController extends Controller
{
     private $user;

      public function __construct(UserRepository $user)
      {
        $this->user = $user;
      }

      public function getAllStudent()
      {
        $role = 2;//student role
        $is_approve = 1; //approved
        $with = ['userProfile','role','studentProfile.studentQualify.Qualify'];
        $where =['role_id'=>$role,'is_approve'=>$is_approve];
        $users = $this->user->getAllWithWhere($with,$where);

        //pakai yang di bawah ini ada angka 8 yang entah dari mana, mungkin dari id dari record pertama
        // $users = $this->user->getAllWith(['userProfile','role','studentProfile.studentQualify.Qualify'])
        //                     ->where('role_id',$role)
        //                     ->where('is_approve',$is_approve);
        return response()->json(compact('users'), 200);
       }
       public function getAllEmployer()
       {
         $role = 1; //employer role
         $is_approve = 1; // approved
         $with = ['userProfile','role','company'];
         $where =['role_id'=>$role,'is_approve'=>$is_approve];
         $users = $this->user->getAllWithWhere($with,$where);
        //  $users = $this->user->getAllWith(['userProfile','role','company'])
        //                      ->where('role_id',$role)
        //                      ->where('is_approve',$is_approve);
         return response()->json(compact('users'), 200);
        }

        public function getUnapprovedUsers()
        {
          $is_approve=0;
          $users = User::with('role')->where('is_approve',$is_approve)->get();
          return response()->json(compact('users'), 200);
         }

      public function getUserDetail($id)
      {
        $with = ['userProfile','role','studentProfile.studentQualify.Qualify','company'];
        $user = $this->user->getWith($with,$id);
        return response()->json(compact('user'), 200);
      }

      public function storeStudent(Request $request)
      {
        $attributes = $request->only('full_name','username','email','password','is_approve','role_id','gender');
        $attributes['role_id']=2;
        $attributes['is_approve']=0;
        $attributes['password']= bcrypt($attributes['password']);
        $user =$this->user->create($attributes);
        return response()->json(compact('user'), 200);
      }
      public function storeEmployer(Request $request)
      {
        $attributes = $request->only('full_name','username','email','password','is_approve','role_id','gender');
        $attributes['role_id']=1;
        $attributes['is_approve']=0;
        $attributes['password']= bcrypt($attributes['password']);
        $user =$this->user->create($attributes);
        return response()->json(compact('user'), 200);
      }

      // public function storeAdmin(Request $request)
      // {
      //   $attributes = $request->only('full_name','username','email','password','is_approve','role_id');
      //   $attributes['role_id']=3;
      //   $attributes['is_approve']=1;
      //   $attributes['password']= bcrypt($attributes['password']);
      //   $user =$this->user->create($attributes);
      //   return response()->json(compact('user'), 200);
      // }
      public function updateuser($id, Request $request)
      {
        $attributes = $request->only('full_name','gender');
        $user = $this->user->update($id, $attributes);
        $user = $this->user->getById($id);

        return response()->json(compact('user'), 200);
      }

      public function deleteuser($id)
      {
        $user = $this->user->destroy($id);
        return response()->json(compact('user'), 200);
      }

//ok
      public function approveUser($user_id)
      {
        $id = token::instance()->id;
        $attributes['is_approve'] = 1;
         $user = $this->user->update($user_id, $attributes);
         $user = $this->user->getById($user_id);
        return response()->json(compact('user'), 200);
       }

      public function getEmployerJobs($employer_id)
      {
        $employerJobs = $this->user->getWith(['userProfile','role','company','job'],$employer_id);
        return response()->json(compact('employerJobs'), 200);
       }


}
