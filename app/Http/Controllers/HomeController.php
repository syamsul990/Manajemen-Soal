<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;

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
        // dd(auth()->user()->level);
        if(auth()->user()->level == 1){
            return view('home');
         }
         elseif(auth()->user()->level == 2) {
             return view('dashboard');
         }
         elseif(auth()->user()->level == 3) {
            Auth::logout();
             return redirect()->back()->withErrors(['level'=>'Anda Tidak Memiliki Akses Ke Halaman ini!']);
         }
    }

    public function admin()
    {
        return view('admin');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('/layouts/profile',['user' =>$user]);
    }




}
