<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function get_users()
    {
        return User::users()->get();
    }
    public function get_admins()
    {
        return User::admins()->get();
    }
}
