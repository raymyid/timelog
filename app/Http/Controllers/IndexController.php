<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    function index()
    {
        return view('welcome');
    }

    function admin()
    {
        return view('admin.index');
    }
}
