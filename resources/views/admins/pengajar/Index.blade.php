@extends('admins.layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">

                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                Tambah Pengajar
                </button>

                <div class="row">
                    <div class="col-md-12">
                    <div class="panel">
								<div class="panel-heading">
                    <h3 class="panel-title">Data Pengajar</h3>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
                        <th>NIK</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Mengajar</th>
                        <th>Action</th>
											</tr>
										</thead>
										<tbody>
                         @foreach($data_pengajar as $pengajar)
                        <tr>
                            <td>{{$pengajar->NIK}}</td>
                            <td>{{$pengajar->nama_lengkap}}</td>
                            <td>{{$pengajar->jenis_kelamin}}</td>
                            <td>{{$pengajar->kelas}}</td>
                            <td>{{$pengajar->jurusan}}</td>
                            <td>{{$pengajar->mengajar}}</td>
                            <td>
                                <a href="/admins/pengajar/{{$pengajar->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                <a href="/admins/pengajar/{{$pengajar->id}}/delete" class="btn btn-danger btn-sm" 
                                onclick="return confirm('Apakah Anda Yakin ?')">Delete</a>
                            </td>                
                        </tr>
                         @endforeach
										</tbody>
									</table>
								</div>
							</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Pengajar -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="exampleModalLabel">Tambah Pengajar</h4>
      </div>
      <div class="modal-body">
        
        <form action="/admins/pengajar/create" method="POST">
        {{csrf_field()}}
            <div class="form-group">
                <h5>NIK</h5>
                <input name="NIK" type="text" class="form-control" id="#" aria-describedby="emailHelp" placeholder="NIK">
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
            <h5>Mengajar</h5>
                <select name="mengajar" class="form-control" id="exampleFormControlSelect1">
                <option value="Bahasa Indonesia">Bahasa Indonesia</option>
                <option value="Bahasa Iggris">Bahasa Inggris</option>
                <option value="Sejarah">Sejarah</option>
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
@stop