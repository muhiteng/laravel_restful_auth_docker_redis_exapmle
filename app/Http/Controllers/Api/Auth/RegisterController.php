<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;

use App\Http\Requests\RegisterRequest;

use App\Models\Employees\Employee;
use App\Models\Employees\Position;
use App\Models\Employees\Shift;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{
    // make public account
    public function register(RegisterRequest $request)
    {
        
        $user = User::create(
            $request->only('first_name','last_name', 'email')
            + [
                'password' =>Hash::make($request->input('password')),
                'ia_admin'=>1
            ]
        );
       // $user->attachRole('employee');
        return response($user, Response::HTTP_CREATED);
    }
   
}
