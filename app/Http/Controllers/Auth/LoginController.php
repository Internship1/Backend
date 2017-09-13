<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }


    public function Login(Request $request)
          {
            $credentials = Input::only('email', 'password');
            $user = User::where('email', '=', $credentials['email'])->first();
            $customClaims = ['role_id' => $user->role_id];
              try {
                //JWT::fromUser($user,['role' => $user->role])
                  // attempt to verify the credentials and create a token for the user
                  if (! $token = JWTAuth::attempt($credentials,$customClaims)) {
                      return response()->json(['error' => 'invalid_credentials'], 401);
                  }
              } catch (JWTException $e) {
                  // something went wrong whilst attempting to encode the token
                  return response()->json(['error' => 'could_not_create_token'], 500);
              }
              // all good so return the token
              return response()->json(compact('token'));
          }
    
//    public function logout(Request $request)
//    {
//        $request->user()->token()->revoke();
//
//        $this->guard()->logout();
//
//        $request->session()->flush();
//
//        $request->session()->regenerate();
//
//        $json = [
//            'success' => true,
//            'code' => 200,
//            'message' => 'You are Logged out.',
//        ];
//        return response()->json($json, '200');
//    }
//
//protected function guard()
//{
//    return Auth::guard('api');
//}
   

}
