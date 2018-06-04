<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Toastr;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Toastr::error('You can not access this function', $title = null, $options = []);
        return redirect()->route('manageadmin');
    }
}
