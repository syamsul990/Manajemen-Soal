<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Siswa;
use App\Notifications\SendPassword;
use App\User;
use Storage;
use Avatar;
class SiswaController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $data_siswa = \App\Siswa::where('nama_lengkap','LIKE','%'.$request->search.'%')->get();
        }else{
            $data_siswa = \App\Siswa::where('jurusan','Multimedia','%'.$request.'%')->get();
        }
        return view('/home',compact('data_siswa'));
    }

    public function multimedia(Request $request)
    {
        if($request->has('search')){
            $data_siswa = \App\Siswa::where('nama_lengkap','LIKE','%'.$request->search.'%')->get();
        }else{
            $data_siswa = \App\Siswa::where('jurusan','Multimedia','%'.$request.'%')->get();
        }
        return view('admin.siswa.multimedia',compact('data_siswa'));
    }

    public  function pemasaran(Request $request)
    {
        $data_siswa = \App\Siswa::where('jurusan','Pemasaran','%'.$request.'%')->get();
        return view('admin.siswa.pemasaran',compact('data_siswa'));
    }

    public  function akuntansi(Request $request)
    {
        $data_siswa = \App\Siswa::where('jurusan','Akuntansi','%'.$request.'%')->get();
        return view('admin.siswa.akuntansi',compact('data_siswa'));
    }

    public function create(Request $request)
    {
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
        //  $data['id_user'] = $data->id();
         $siswa = Siswa::create($data);

         //membuat ke tabel user
         $user = User::create([
             'name' => $data['nama_lengkap'],
             'email' => $data['email'],
             'password' => $data['password'],
             'level' => $data['level'],
             'avatar' => 'avatar.png',
         ]);

        $user->makeAvatar();
        $user->send_password = $randomString;
        $user->notify(new SendPassword($user));

         return redirect('/home')->with('sukses','Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $siswa = \App\Siswa::find($id);
        return view('/admin/siswa/edit',compact('siswa'));
    }

    public function update(Request $request,$id)
    {
        $siswa = \App\Siswa::find($id);
        $siswa->update($request->all());
        return redirect('/admin/siswa')->with('sukses','Data Berhasil Diupdate');
    }

    public function delete($id)
    {
        $siswa = \App\Siswa::find($id);


        $siswa->delete($siswa);
        return redirect('/admin/siswa')->with('sukses','Data Berhasil Dihapus');
    }
}
