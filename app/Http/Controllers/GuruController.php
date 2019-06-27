<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $guru = \App\Guru::all();
        
        return view('guru/index');
    }

    public function soal(Request $request){
        return view('guru/soal');
    }

    public function inputSoal(Request $request){
        if($request->has('jum_soal')){
            $jum_soal = $request->jum_soal;

            return view('guru/input_soal', compact('jum_soal'));
        }
    }
}
