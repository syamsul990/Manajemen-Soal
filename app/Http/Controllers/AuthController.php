<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Hash;
use App\User;
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
        if ($user->level !== 3) {
            return response()->json([
                'data' => null,
                'meta' => [
                    'message'=>"Anda Tidak Berhak Mengakses Halaman Ini",
                    'status_code'=> 406,
                ]
            ]);
        }
        return response()->json([
            'data' => $user,
            'meta' => [
                'message'=>"success",
                'status_code'=> 200,
            ]
        ]);

    }
}
