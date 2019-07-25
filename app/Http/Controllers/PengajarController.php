<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengajarController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $data_pengajar = \App\Pengajar::where('nama_lengkap','jurusan','kelas','LIKE','%'.$request->search.'%')->get();
        }else{
            $data_pengajar = \App\Pengajar::all();
        }
        return view('admins.pengajar.index',compact('data_pengajar'));
    }

    public function create(Request $request)
    {
        \App\Pengajar::create($request->all());
        return redirect('admins/pengajar')->with('sukses','Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $pengajar = \App\Pengajar::find($id);
        return view('/admins/pengajar/edit',compact('pengajar'));
    }

    public function update(Request $request,$id)
    {
        $pengajar = \App\Pengajar::find($id);
        $pengajar->update($request->all());
        return redirect('/admins/pengajar')->with('sukses','Data Berhasil Diupdate');
    }

    public function delete($id)
    {
        $pengajar = \App\Pengajar::find($id);
        $pengajar->delete($pengajar);
        return redirect('/admins/pengajar')->with('sukses','Data Berhasil Dihapus');
    }
}
