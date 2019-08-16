<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Mapel;
use Storage;
use File;
use Illuminate\Support\Facades\DB;
class MapelController extends Controller
{
    public function index()
    {
        $data_mapel = DB::table('matapelajaran')->where([
            ['kategori', '=', 'Umum'],
        ])->get();
        return view('/admin/mapel/index',compact('data_mapel'));
    }

    public function kejuruan(Request $id)
    {
        $data_mapel = DB::table('matapelajaran')->where([
            ['kategori', '=', 'Kejuruan'],
        ])->get();
            return view('admin.mapel.kejuruan',compact('data_mapel'));
    }

    // public function create(Request $request)
    // {
    //     if($request->hasFile('icon')){
    //         $file = $request->file('icon');
    //         $name = time() . $file->getClientOriginalName();
    //         $path = "public/icon_mapel/$name";
    //         Storage::put($path, File::get($file->getRealPath()));
    //         $request['icon'] = $name;
    //     }
    //     Mapel::create($request->all());
    //     return redirect('/admin/mapel')->with('sukses','Data Berhasil Ditambahkan');
    // }

    public function create(Request $request){
        $input = $request->all();
            $mapel = [
                'kd_mapel' =>$input['kd_mapel'],
                'nama_pelajaran' => $input['nama_pelajaran'],
                'kelas' => $input['kelas'],
                'jurusan'=> $input['jurusan'],
                'semester' => $input['semester'],
                'kategori'=> $input['kategori'],
                'icon' => $input['icon']
            ];
            if($request->hasFile('icon')){
                $file = $request->file('icon');
                $name = time() . $file->getClientOriginalName();
                $path = "public/icon_mapel/$name";
                Storage::put($path, File::get($file->getRealPath()));
                $mapel['icon'] = $name;
            }
            Mapel::create($mapel);

        return redirect('/admin/mapel');
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
