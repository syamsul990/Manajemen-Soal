<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Siswa;
use App\Notifications\SendPassword;
use App\User;
use Storage;
use Avatar;
use Validator;
use Illuminate\Support\Facades\DB;
class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $data_siswa = DB::table('users')
        ->join('siswa', 'users.id', '=', 'siswa.user_id')
        ->select('users.*', 'siswa.*')
        ->get();
        return view('/home',compact('data_siswa'));
    }

    public function multimedia(Request $request)
    {
        $data_siswa = DB::table('users')
        ->join('siswa', 'users.id', '=', 'siswa.user_id')
        ->select('users.*', 'siswa.*')
        ->where('siswa.jurusan', 'Multimedia')
        ->get();
        return view('admin.siswa.multimedia',compact('data_siswa'));
    }

    public  function pemasaran(Request $request)
    {
        $data_siswa = DB::table('users')
        ->join('siswa', 'users.id', '=', 'siswa.user_id')
        ->select('users.*', 'siswa.*')
        ->where('siswa.jurusan', 'Pemasaran')
        ->get();
        return view('admin.siswa.pemasaran',compact('data_siswa'));
    }

    public  function akuntansi(Request $request)
    {
        $data_siswa = DB::table('users')
        ->join('siswa', 'users.id', '=', 'siswa.user_id')
        ->select('users.*', 'siswa.*')
        ->where('siswa.jurusan', 'Akuntansi')
        ->get();
        return view('admin.siswa.akuntansi',compact('data_siswa'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }
        $data = $request->all();
        //randmon password
         $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
         $charactersLength = strlen($characters);
         $randomString = '';
         for ($i = 0; $i < 5; $i++) {
             $randomString .= $characters[rand(0, $charactersLength - 1)];
         }

         $data['password'] = $randomString;
         $data['send_password'] = $randomString;
         $data['password'] = Hash::make($data['password']);
         $data['level'] = 3;

         //membuat ke tabel user
         $user = User::create([
             'name' => $data['nama_lengkap'],
             'email' => $data['email'],
             'password' => $data['password'],
             'level' => $data['level'],
             'avatar' => 'avatar.png',
         ]);
         $data['user_id'] = $user->id;
         $data_siswa = Siswa::create($data);

        $avatar = Avatar::create($user->name)->getImageObject()->encode('png');
        Storage::put('public/avatars/'.$user->id.'/avatar.png', (string) $avatar);

        $user->send_password = $randomString;
        $user->notify(new SendPassword($user));

         return redirect('/home');
    }

    public function edit($id)
    {
        $data_siswa = \App\Siswa::find($id);
        $user = User::find($data_siswa->user_id);
        return view('/admin/siswa/edit',compact('data_siswa','user'));
    }

    public function update(Request $request,$id)
    {
        $data_siswa = \App\Siswa::find($id);
        $data_siswa->update($request->all());
        $user = User::find($data_siswa->user_id);
        $user->update(['name' => $request->name]);
        $avatar = Avatar::create($user->name)->getImageObject()->encode('png');
        Storage::put('public/avatars/'.$user->id.'/avatar.png', (string) $avatar);

        return redirect('/home');
    }

    public function delete($id)
    {
        $siswa = Siswa::find($id);
        $user = User::find($siswa->user_id);
        $siswa->delete();
        $user->delete ();
        return redirect('/admin/siswa')->with('sukses','Data Berhasil Dihapus');
    }
}
