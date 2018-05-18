<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    Public function getAdmin()
    {
        return view('admin.index');
    }
}
