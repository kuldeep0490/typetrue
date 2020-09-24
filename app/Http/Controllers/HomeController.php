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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leads = \App\Lead::orderBy('created_at', 'desc')->get();


        return view('home', ['leads' => $leads]);
    }

    public function getData()
    {
        $leads = \App\Lead::orderBy('created_at', 'desc')->get();

        return response()->json($leads);
    }
}
