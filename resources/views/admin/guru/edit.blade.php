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
									<h3 class="panel-title">Ed$guru</h3>
								</div>
								<div class="panel-body">
                                <form action="/admin/guru/{{$data_guru->id}}/update" method="POST">
                                    {{csrf_field()}}
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">NIK</label>
                                            <input name="NIP" type="text" class="form-control" id="#" aria-describedby="emailHelp" placeholder="NIP"
                                            value="{{$data_guru->NIP}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Lengkap</label>
                                            <input name="nama_lengkap" type="text" class="form-control" id="#" aria-describedby="emailHelp" placeholder="Nama Lengkap"
                                            value="{{$data_guru->nama_lengkap}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                                            <option value="Laki-Laki" @if($data_guru->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
                                            <option value="Perempuan" @if($data_guru->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Kelas</label>
                                            <select name="kelas" class="form-control" id="exampleFormControlSelect1">
                                            <option value="1" @if($data_guru->kelas == '1') selected @endif>Kelas 1</option>
                                            <option value="2" @if($data_guru->kelas == '2') selected @endif>Kelas 2</option>
                                            <option value="3" @if($data_guru->kelas == '3') selected @endif>Kelas 3</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Jurusan</label>
                                            <select name="jurusan" class="form-control" id="exampleFormControlSelect1">
                                            <option value="Multimedia" @if($data_guru->jurusan == 'Multimedia') selected @endif>Multimedia</option>
                                            <option value="Akuntansi"  @if($data_guru->jurusan == 'Akuntansi') selected @endif>Akuntansi</option>
                                            <option value="Pemasaran"  @if($data_guru->jurusan == 'Pemasaran') selected @endif>Pemasaran</option>
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
