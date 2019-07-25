<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Hash;
use App\User;
use App\Siswa;
class AuthController extends Controller
{
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => [],
                'meta' => [
                    'message'=> 'Email or password is wrong',
                    'status_code'=> 500
                ]
            ]);
        }

        if (!User::where('email', $request['email'])->exists()) {
        	return response()->json([
                'data' => [],
                'meta' => [
                    'message'=>"Canot find email",
                    'status_code'=> 404,
                ]
            ]);
        }


        if (!Hash::check($request['password'], User::where('email', $request['email'])->first()->makeVisible('password')->password)) {
            return response()->json([
                'data' => [],
                'meta' => [
                    'message'=>"Combination of email and password is wrong",
                    'status_code'=> 404,
                ]
            ]);
        }

        $user = User::where('email', $request['email'])->first();
        $siswa = Siswa::where('user_id',$user->id)->first();

        if ($user->level !== 3) {
            return response()->json([
                'data' => null,
                'meta' => [
                    'message'=>"Anda Tidak Berhak Mengakses Halaman Ini",
                    'status_code'=> 406,
                ]
            ]);
        }
        // return  $user->avatar_url;
        return response()->json([
            'data' => [
                'nama_lengkap' => $siswa['nama_lengkap'],
                'nis' => $siswa['NIS'],
                'jk' => $siswa['jenis_kelamin'],
                'kelas' => $siswa['kelas'],
                'jurusan' => $siswa['jurusan'],
                'semester' => $siswa['semester'],
                'thn_angkatan' => $siswa['thn_angkatan'],
                'email' => $user->email,
                'avatar' => $user->avatar_url
            ],
            'meta' => [
                'message'=>"success",
                'status_code'=> 200,
            ]
        ]);

    }
}
