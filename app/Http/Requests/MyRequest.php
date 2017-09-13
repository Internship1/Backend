<?php namespace App\Http\Requests;

// app/Http/Requests/MyRequest.php

use App\UserProfile;
use JWTAuth;
use Request;

class MyRequest extends Request
{
    public function authorize()
    {
        try {

          if (! $user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['user_not_found'], 404);
          }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

          return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

          return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

          return response()->json(['token_absent'], $e->getStatusCode());

        }
        $role_id = $user->role_id;
        $id= $user->id;
        
        
        $userprofile = UserProfile::findOrFail( $this->id );  // $id is a route parameter

        return $userprofile->user_id === $id;
    }

    public function rules()
    {
        return [];
    }

    // override this to redirect back
    public function forbiddenResponse()
    {
        return redirect()->back()->withInput()->withErrors('forbidden');
    }
}