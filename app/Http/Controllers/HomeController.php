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
        if(auth()->user()->level == 1){
            return view('home');
         }
         elseif(auth()->user()->level == 2) {
             return view('dashboard');
         }
         else {
             redirect()->back()->withErrors(['level'=>'Anda Tidak Memiliki Akses Ke Halaman ini!']);
         }
    }

    public function admin()
    {
        return view('admin');
    }
}
