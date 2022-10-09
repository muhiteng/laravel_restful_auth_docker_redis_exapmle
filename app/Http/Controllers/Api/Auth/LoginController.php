<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
       
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $user = Auth::user();
            $data['user'] =new UserResource($user);
            $data['token'] = $user->createToken('my-app-token')->plainTextToken;

            return response()->api($data);

        } else {

            return response()->api([], 1, Response::HTTP_UNAUTHORIZED);
        }
    }
    public function loginc(LoginRequest $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $user = Auth::user();
            $data['user'] = new UserResource($user);
            $token=$user->createToken('my-app-token')->plainTextToken;
            $data['token'] = $token;
            $cookie = cookie('jwt', $token, 60 * 24); // 1 day
            return response([
              //  'message' => 'success'
                'message' => $token
            ])->withCookie($cookie);
        } else {

            return response()->api([], 1, Response::HTTP_UNAUTHORIZED);
        }
    }


}
