<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\User\LoginRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if(!$token = auth()->attempt($credentials))
            return response('Incorrect credentials', 401);

        sleep(3);

        return $this->respondWithToken($token);
    }

    public function logout()
    {
        auth()->logout();

        return response(null, 200);
    }

    public function refresh()
    {
        if(!$token = JWTAuth::getToken())
            throw new BadRequestHttpException('Token not provided');

        try {
            $token = JWTAuth::refresh($token);
        } catch(TokenExpiredException $e) {
            return response('Refresh token has expired', 401);
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in'   => auth()->factory()->getTTL() * 60,
            'timestamp' => Carbon::now()->timestamp
        ], 200);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth()->factory()->getTTL() * 60,
            'timestamp' => Carbon::now()->timestamp,
            'user' => $this->guard()->user()
        ], 200);
    }

    public function guard()
    {
        return Auth::guard();
    }
}
