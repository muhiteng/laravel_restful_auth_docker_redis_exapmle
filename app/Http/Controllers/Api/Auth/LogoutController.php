<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use http\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    
    public function logout_cookie()
    {
        
        $cookie = \Cookie::forget('jwt');

        return response([
            'message' => 'success'
        ])->withCookie($cookie);
    }
    public function logout(Request $request)
    {

// Revoke the token that was used to authenticate the current request...
        $request->user()->currentAccessToken()->delete();


        return response()->noContent();

    }

    public function logout_all(Request $request)
    {

// Revoke the token that was used to authenticate the current request...
        $users=User::all();
        foreach($users as $user)
            $user->currentAccessToken()->delete();


        return response()->noContent();

    }

}
