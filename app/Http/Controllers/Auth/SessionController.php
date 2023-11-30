<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\Auth\GetAuthenticatedUserResource;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Lockout;


class SessionController extends Controller
{




  public function login(LoginRequest $request)
  {

    $request->authenticate();
    $user = User::where('username', $request->validated('username'))->first();
    $token = $user->createToken('Bearer')->plainTextToken;
    return response()->json([
      'data' => new GetAuthenticatedUserResource($user),
      'token' => $token
    ]);

    /*
    try {
      if (!Auth::attempt($request->validated())) {
        RateLimiter::hit('usernmae|233333');

        return       RateLimiter::remaining('usernmae|233333', 3);
      } else {
        return 'si pasó validación';
      }
    } catch (\Exception $e) {

      return response()->json([
        "message" => trans('auth.failed'),
        "errors" => [
          "username" => [
            trans('auth.throttle'),
          ]
        ],
      ]);
    }




    $request->validate();


    $credentials = $request->validated();
    if (!Auth::attempt($credentials)) {

      return response()->json([
        "message" => trans('auth.failed'),
        "errors1" => [
          "username" => [
            trans('auth.failed'),
          ]
        ],
      ]);
    }

  
      $credentials = $request->validated();
    if (Auth::attempt($credentials)) {
      $user = User::where('username', $request->validated('username'))->first();
      return response()->json([
        'data' => new GetAuthenticatedUserResource($user)
      ]);
    } else {
      return response()->json([
        "message" => trans('auth.failed'),
        "errors1" => [
          "username" => [
            trans('auth.failed'),
            trans('auth.throttle')
          ]
        ],
      ]);
    } */
  }

  public function logout()
  {
    //
  }
}
