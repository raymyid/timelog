<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function index($value)
    {
        $user = User::where('username', $value)->first();

        if (is_null($user))
        {
            return response('404', 404);
        }

        return view('users.index')->with('user', $user);
    }
}
