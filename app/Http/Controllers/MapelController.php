<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index(Request $request)
    {

        $data_mapel = \App\Mapel::all();
        // dd($data_mapel);
        return view('/admin/mapel/index',compact('data_mapel'));
    }
    public function create(Request $request)
    {
        \App\Mapel::create($request->all());
         return redirect('/admin/mapel')->with('sukses','Data Berhasil Ditambahkan');
    }


    public function edit($id)
    {
        $data_mapel = \App\Mapel::find($id);
        return view('/admin/mapel/edit',compact('data_mapel'));
    }

    public function update(Request $request,$id)
    {
        $data_mapel = \App\Mapel::find($id);
        $data_mapel->update($request->all());
        return redirect('/admin/mapel')->with('sukses','Data Berhasil Diupdate');
    }

    public function delete($id)
    {
        $data_mapel = \App\Mapel::find($id);
        $data_mapel->delete($data_mapel);

        return redirect('/admin/mapel')->with('sukses','Data Berhasil Dihapus');
    }
}
