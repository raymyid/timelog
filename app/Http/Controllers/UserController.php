<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function index($value)
    {
        $user = User::where('name', $value)->first();

        if (is_null($user))
        {
            return response('404', 404);
        }

        return view('user.index')->with('user', $user);
    }
}
