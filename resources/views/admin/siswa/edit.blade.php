@extends('layouts.master_admin')

@section('content')
@if(session('sukses'))
        <div class="alert alert-success" role="alert">
            {{session('sukses')}}
        </div>
@endif
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                    <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Edit Data Siswa</h3>
								</div>
								<div class="panel-body">
                                <form action="/admins/siswa/{{$siswa->id}}/update" method="POST">
                                    {{csrf_field()}}
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">NIS</label>
                                            <input name="NIS" type="text" class="form-control" id="#" aria-describedby="emailHelp" placeholder="NIS"
                                            value="{{$siswa->NIS}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Lengkap</label>
                                            <input name="nama_lengkap" type="text" class="form-control" id="#" aria-describedby="emailHelp" placeholder="Nama Lengkap"
                                            value="{{$siswa->nama_lengkap}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                                            <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
                                            <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Kelas</label>
                                            <select name="kelas" class="form-control" id="exampleFormControlSelect1">
                                            <option value="1" @if($siswa->kelas == '1') selected @endif>Kelas 1</option>
                                            <option value="2" @if($siswa->kelas == '2') selected @endif>Kelas 2</option>
                                            <option value="3" @if($siswa->kelas == '3') selected @endif>Kelas 3</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Jurusan</label>
                                            <select name="jurusan" class="form-control" id="exampleFormControlSelect1">
                                            <option value="multimedia" @if($siswa->jurusan == 'multimedia') selected @endif>Multimedia</option>
                                            <option value="akuntansi"  @if($siswa->jurusan == 'akuntansi') selected @endif>Akuntansi</option>
                                            <option value="pemasaran"  @if($siswa->jurusan == 'pemasaran') selected @endif>Pemasaran</option>
                                            </select>
                                        </div>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@stop
