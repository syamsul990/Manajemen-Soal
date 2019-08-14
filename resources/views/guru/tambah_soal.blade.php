@extends('layouts.master_guru')
@section('content')
<div class="main">
        <div class="main-content">
                @if($errors->any())

                <div class="alert alert-danger" role="alert">
                    <ul>
                         @foreach ($errors->all() as $error)
                        <li style="color:red">
                            {{$error}}
                        </li>
                        @endforeach
                    </ul>
                  </div>
                @endif
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
                                            <label for="kelas">Kelas</label>
                                            <select name="kelas" class="form-control" id="kd_mapel">
                                                @foreach ($mapel as $mpl)
                                                    <option value="{{$mpl->kelas}}">{{$mpl->kelas}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="Jurusan">Jurusan</label>
                                            <select name="jurusan" class="form-control" id="Jurusan">
                                                    <option value="Pemasaran">Pemasaran</option>
                                                    <option value="Pemasaran">Akuntansi</option>
                                                    <option value="Pemasaran">Multimedia</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                                <label for="kd_mapel">Matapelajaran</label>
                                                <select name="kd_mapel" class="form-control" id="kd_mapel">
                                                    @foreach ($mapel as $mpl)
                                                        <option value="{{$mpl->kd_mapel}}">{{$mpl->nama_pelajaran}}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                        <div class="form-group">
                                                <label for="semester">Semester</label>
                                                <select name="semester" class="form-control" id="semester">
                                                @foreach ($mapel as $mpl)
                                                    <option value="{{$mpl->semester}}">{{$mpl->semester}}</option>
                                                @endforeach
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="semester">Waktu Ujian Mulai</label>
                                            <input name="waktu_mulai" class="date form-control" type="datetime-local">
                                        </div>
                                        <div class="form-group">
                                            <label for="semester">Waktu Ujian Selesai</label>
                                            <input name="waktu_selesai" class="date form-control" type="datetime-local">
                                        </div>
                                    <br>
                                    <button class="btn btn-primary">Simpan</button>
                                 </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
