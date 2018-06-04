<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Toastr;

class AdminController extends Controller
{
    Public function getAdmin()
    {
        return view('admin.index');
    }
    Public function logout(){
    	Auth::logout();
    	Toastr::success('Logout successful', $title = null, $options = []);
    	return redirect()->route('home');
    }
}
