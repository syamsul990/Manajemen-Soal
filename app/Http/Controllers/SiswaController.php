<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Siswa;
<<<<<<< HEAD
use App\Notifications\SendPassword;
use App\User;
use Storage;
use Avatar;
=======


>>>>>>> 33a8915fad837a6b55e6c4b9d80e25e5a3777af2
class SiswaController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $data_siswa = \App\Siswa::where('nama_lengkap','LIKE','%'.$request->search.'%')->get();
        }else{
            $data_siswa = \App\Siswa::where('jurusan','Multimedia','%'.$request.'%')->get();
        }
<<<<<<< HEAD
        return view('/home',compact('data_siswa'));
=======
        return view('/admins.index',compact('data_siswa'));
>>>>>>> 33a8915fad837a6b55e6c4b9d80e25e5a3777af2
    }

    public function multimedia(Request $request)
    {
        if($request->has('search')){
            $data_siswa = \App\Siswa::where('nama_lengkap','LIKE','%'.$request->search.'%')->get();
        }else{
            $data_siswa = \App\Siswa::where('jurusan','Multimedia','%'.$request.'%')->get();
        }
<<<<<<< HEAD
        return view('admin.siswa.multimedia',compact('data_siswa'));
=======
        return view('admins.siswa.multimedia',compact('data_siswa'));
>>>>>>> 33a8915fad837a6b55e6c4b9d80e25e5a3777af2
    }

    public  function pemasaran(Request $request)
    {
        $data_siswa = \App\Siswa::where('jurusan','Pemasaran','%'.$request.'%')->get();
<<<<<<< HEAD
        return view('admin.siswa.pemasaran',compact('data_siswa'));
=======
        return view('admins.siswa.pemasaran',compact('data_siswa'));
>>>>>>> 33a8915fad837a6b55e6c4b9d80e25e5a3777af2
    }

    public  function akuntansi(Request $request)
    {
        $data_siswa = \App\Siswa::where('jurusan','Akuntansi','%'.$request.'%')->get();
<<<<<<< HEAD
        return view('admin.siswa.akuntansi',compact('data_siswa'));
=======
        return view('admins.siswa.akuntansi',compact('data_siswa'));
>>>>>>> 33a8915fad837a6b55e6c4b9d80e25e5a3777af2
    }

    public function create(Request $request)
    {
        $data = $request->all();
        //randmon password
         $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
         $charactersLength = strlen($characters);
         $randomString = '';
<<<<<<< HEAD
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
=======
         for ($i = 0; $i < 10; $i++) {
             $randomString .= $characters[rand(0, $charactersLength - 1)];
         }
         
         $data['password'] = $randomString;

         $data['password'] = Hash::make($data['password']);
         
         Siswa::create($data);

        //kirim $randomString ke email siswa
        
        return redirect('/admins/siswa')->with('sukses','Data Berhasil Ditambahkan');
>>>>>>> 33a8915fad837a6b55e6c4b9d80e25e5a3777af2
    }

    public function edit($id)
    {
        $siswa = \App\Siswa::find($id);
<<<<<<< HEAD
        return view('/admin/siswa/edit',compact('siswa'));
=======
        return view('/admins/siswa/edit',compact('siswa'));
>>>>>>> 33a8915fad837a6b55e6c4b9d80e25e5a3777af2
    }

    public function update(Request $request,$id)
    {
        $siswa = \App\Siswa::find($id);
        $siswa->update($request->all());
<<<<<<< HEAD
        return redirect('/admin/siswa')->with('sukses','Data Berhasil Diupdate');
=======
        return redirect('/admins/siswa')->with('sukses','Data Berhasil Diupdate');
>>>>>>> 33a8915fad837a6b55e6c4b9d80e25e5a3777af2
    }

    public function delete($id)
    {
        $siswa = \App\Siswa::find($id);
<<<<<<< HEAD


        $siswa->delete($siswa);
        return redirect('/admin/siswa')->with('sukses','Data Berhasil Dihapus');
=======
        $siswa->delete($siswa);
        return redirect('/admins/siswa')->with('sukses','Data Berhasil Dihapus');
>>>>>>> 33a8915fad837a6b55e6c4b9d80e25e5a3777af2
    }
}
