<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if (auth()->user()->level == 'Admin') {
            return redirect('/admin/dashboard');
        }

        if (auth()->user()->level == 'Instructor') {
            return redirect('/instructor/dashboard');
        }

        if (auth()->user()->level == 'User') {
            return redirect('/user/dashboard');
        }

        return view('home');
    }
}
