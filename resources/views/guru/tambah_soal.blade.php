@extends('layouts.master_guru')

@section('content')

<div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Tambah Soal Ujian</h3>
                            </div>
                            <div class="panel-body">
                                    <form action="/guru/tambah_soal" method="GET">

                                        <div class="form-group">
                                            <label for="">Jumlah Soal</label>
                                            <input type="number" class="form-control" name="jum_soal" placeholder="Masukan Jumlah Soal">
                                        </div>

                                        <div class="form-group">
                                            <label for="jenis_ujian">Jenis Ujian</label>
                                            <select name="jenis_ujian" class="form-control" id="jenis_ujian">
                                            <option value="UAS">Ujian Akhir Semester</option>
                                            <option value="UTS">Ujian Tengah Semester</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="Kelas">Kelas</label>
                                            <select name="kelas" class="form-control" id="Kelas">
                                            <option value="1">Kelas 1</option>
                                            <option value="2">Kelas 2</option>
                                            <option value="3">Kelas 3</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="Jurusan">Jurusan</label>
                                            <select name="jurusan" class="form-control" id="Jurusan">
                                            <option value="Multimedia">Multimedia</option>
                                            <option value="Akuntansi">Akuntansi</option>
                                            <option value="Pemasaran">Pemasaran</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                                <label for="nama_pelajaran">Matapelajaran</label>
                                                <select name="nama_pelajaran" class="form-control" id="nama_pelajaran">
                                                <option value="B-Indonesia">Bahasa Indonesia</option>
                                                <option value="B-Inggris">Bahasa Inggris</option>
                                                <option value="Matematika">Matematika</option>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                                <label for="semester">Semester</label>
                                                <select name="semester" class="form-control" id="semester">
                                                <option value="Ganjil">Ganjil</option>
                                                <option value="Genap">Genap</option>
                                                </select>
                                            </div>
                                    <br>
                                    <button class="btn btn-primary">Simpan</button>
                                 </form>
                                    {{-- <form action="/guru/soal/input" method="GET">
                                        <input type="number" class="form-control" name="jum_soal" placeholder="jumlah soal">
                                        <button class="btn btn-primary">Simpan</button>
                                    </form> --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
