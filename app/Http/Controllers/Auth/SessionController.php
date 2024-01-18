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
    // $request->authenticate();

    $user = User::where('username', $request->validated('username'))->first();
    return response()->json([$user]);
    /*
      $token = $user->createToken('Bearer')->plainTextToken;
      return response()->json([
        'data' => new GetAuthenticatedUserResource($user),
        'token' => $token
      ]);
    */
  }

  public function logout()
  {
    Auth::logout();
    return response(200);
  }
}
