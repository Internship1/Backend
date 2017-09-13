<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use DB;
use App\Models\Post;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
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
      $is_approve= $user->is_approve;
      $request->merge(array("id" => $id));
      $request->merge(array("role" => $role_id));
      //$request->merge(array("" => $id));
      if($is_approve == 1)
      {

          if($role == 'admin')
          {
            if($role_id == 3)
            {
                return $next($request);
            }
          }
          elseif($role == 'student')
          {
            if($role_id == 2)
            {
                return $next($request);
            }
          }
          elseif($role == 'employer')
          {
            if($role_id == 1)
            {
                return $next($request);
            }
          }
      }
      else
      {
        return response()->json('error');
      }
//    $user = Auth::user();
//    $post = Post::find($post_id);
//    if($id == $post->user_id){
//        return $next($request);
//    }

    }
}
