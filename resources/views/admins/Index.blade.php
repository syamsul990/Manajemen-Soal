@extends('admins.layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">

                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                        Tambah Siswa
                </button>
            </div>
        </div>
    </div>

<!-- Modal Tambah Siswa -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="exampleModalLabel">Tambah Siswa</h4>
            </div>
            <div class="modal-body">
            
            <form action="/admins/siswa/create" method="POST">
            {{csrf_field()}}
                <div class="form-group">
                    <h5>NIS</h5>
                    <input name="NIS" type="text" class="form-control" id="#" aria-describedby="emailHelp" placeholder="NIS">
                </div>
                <div class="form-group">
                <h5>Nama Lengkap</h5>
                    <input name="nama_lengkap" type="text" class="form-control" id="#" aria-describedby="emailHelp" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                <h5>Jenis Kelamin</h5>
                    <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                <h5>Kelas</h5>
                    <select name="kelas" class="form-control" id="exampleFormControlSelect1">
                    <option value="1">Kelas 1</option>
                    <option value="2">Kelas 2</option>
                    <option value="3">Kelas 3</option>
                    </select>
                </div>
                <div class="form-group">
                <h5>Jurusan</h5>
                    <select name="jurusan" class="form-control" id="exampleFormControlSelect1">
                    <option value="Multimedia">Multimedia</option>
                    <option value="Akuntansi">Akuntansi</option>
                    <option value="Pemasaran">Pemasaran</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
            </form>
            </div>
        </div>
        </div>
@endsection