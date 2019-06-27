<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Siswa;


class SiswaController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $data_siswa = \App\Siswa::where('nama_lengkap','LIKE','%'.$request->search.'%')->get();
        }else{
            $data_siswa = \App\Siswa::where('jurusan','Multimedia','%'.$request.'%')->get();
        }
        return view('/admins.index',compact('data_siswa'));
    }

    public function multimedia(Request $request)
    {
        if($request->has('search')){
            $data_siswa = \App\Siswa::where('nama_lengkap','LIKE','%'.$request->search.'%')->get();
        }else{
            $data_siswa = \App\Siswa::where('jurusan','Multimedia','%'.$request.'%')->get();
        }
        return view('admins.siswa.multimedia',compact('data_siswa'));
    }

    public  function pemasaran(Request $request)
    {
        $data_siswa = \App\Siswa::where('jurusan','Pemasaran','%'.$request.'%')->get();
        return view('admins.siswa.pemasaran',compact('data_siswa'));
    }

    public  function akuntansi(Request $request)
    {
        $data_siswa = \App\Siswa::where('jurusan','Akuntansi','%'.$request.'%')->get();
        return view('admins.siswa.akuntansi',compact('data_siswa'));
    }

    public function create(Request $request)
    {
        $data = $request->all();
        //randmon password
         $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
         $charactersLength = strlen($characters);
         $randomString = '';
         for ($i = 0; $i < 10; $i++) {
             $randomString .= $characters[rand(0, $charactersLength - 1)];
         }
         
         $data['password'] = $randomString;

         $data['password'] = Hash::make($data['password']);
         
         Siswa::create($data);

        //kirim $randomString ke email siswa
        
        return redirect('/admins/siswa')->with('sukses','Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $siswa = \App\Siswa::find($id);
        return view('/admins/siswa/edit',compact('siswa'));
    }

    public function update(Request $request,$id)
    {
        $siswa = \App\Siswa::find($id);
        $siswa->update($request->all());
        return redirect('/admins/siswa')->with('sukses','Data Berhasil Diupdate');
    }

    public function delete($id)
    {
        $siswa = \App\Siswa::find($id);
        $siswa->delete($siswa);
        return redirect('/admins/siswa')->with('sukses','Data Berhasil Dihapus');
    }
}
