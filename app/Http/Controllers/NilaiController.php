<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\User;
use PDF;
use Illuminate\Support\Facades\DB;
use App\Histori;

class NilaiController extends Controller
{
    public function index()
    {
        $data_nilai = DB::table('histori_ujian');
        return view('admin.nilai.Multimedia',compact('data_nilai'));
    }

    public function multimedia1(Request $id)
    {
        $data_nilai1 = DB::table('histori_ujian')->where([
            ['jurusan', '=', 'Multimedia'],
            ['kelas', '=', '1'],
        ])->get();
            return view('admin.nilai.Multimedia.kelas1',compact('data_nilai1'));
    }

    public function multimedia2(Request $id)
    {
        $data_nilai2 = DB::table('histori_ujian')->where([
            ['jurusan', '=', 'Multimedia'],
            ['kelas', '=', '2'],
        ])->get();
            return view('admin.nilai.Multimedia.kelas2',compact('data_nilai2'));
    }


    public function multimedia3(Request $id)
    {
        $data_nilai3 = DB::table('histori_ujian')->where([
            ['jurusan', '=', 'Multimedia'],
            ['kelas', '=', '3'],
        ])->get();
            return view('admin.nilai.Multimedia.kelas3',compact('data_nilai3'));
    }


    public function pemasaran1(Request $id)
    {
        $data_nilai1 = DB::table('histori_ujian')->where([
            ['jurusan', '=', 'Pemasaran'],
            ['kelas', '=', '1'],
        ])->get();
            return view('admin.nilai.Pemasaran.kelas1',compact('data_nilai1'));
    }

    public function pemasaran2(Request $id)
    {
        $data_nilai2 = DB::table('histori_ujian')->where([
            ['jurusan', '=', 'Pemasaran'],
            ['kelas', '=', '2'],
        ])->get();
            return view('admin.nilai.Pemasaran.kelas2',compact('data_nilai2'));
    }

    public function pemasaran3(Request $id)
    {
        $data_nilai3 = DB::table('histori_ujian')->where([
            ['jurusan', '=', 'Pemasaran'],
            ['kelas', '=', '3'],
        ])->get();
            return view('admin.nilai.Pemasaran.kelas3',compact('data_nilai3'));
    }

    public function akuntansi1(Request $id)
    {
        $data_nilai1 = DB::table('histori_ujian')->where([
            ['jurusan', '=', 'Akuntansi'],
            ['kelas', '=', '1'],
        ])->get();
            return view('admin.nilai.Akuntansi.kelas1',compact('data_nilai1'));
    }

    public function akuntansi2(Request $id)
    {
        $data_nilai2 = DB::table('histori_ujian')->where([
            ['jurusan', '=', 'Akuntansi'],
            ['kelas', '=', '2'],
        ])->get();
            return view('admin.nilai.Akuntansi.kelas2',compact('data_nilai2'));
    }

    public function akuntansi3(Request $id)
    {
        $data_nilai3 = DB::table('histori_ujian')->where([
            ['jurusan', '=', 'Akuntansi'],
            ['kelas', '=', '3'],
        ])->get();
            return view('admin.nilai.Akuntansi.kelas3',compact('data_nilai3'));
    }

    public function cetak_pdf()
    {
        $data_nilai1 = DB::table('histori_ujian')->where([
            ['jurusan', '=', 'Multimedia'],
            ['kelas', '=', '1'],
        ])->get();
    	$pdf = PDF::loadview('admin.nilai.cetak_pdf',['data_nilai1'=>$data_nilai1]);
        return $pdf->download('nilai.pdf',compact('data_nilai1'));

    }
}
