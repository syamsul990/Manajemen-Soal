@extends('layouts.master_admin')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">

                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                Tambah Matapelajaran
                </button>

                <div class="row">
                    <div class="col-md-12">
                    <div class="panel">
								<div class="panel-heading">
                    <h3 class="panel-title">Data Matapelajaran Umum</h3>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
                        <th>Kode Mapel</th>
                        <th>Mata Pelajaran</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Icon</th>
                        <th>Action</th>

											</tr>
										</thead>
										<tbody>
                    @foreach($data_mapel as $mapel)
                        <tr>
                            <td>{{ $mapel->kd_mapel }}</td>
                            <td>{{ $mapel->nama_pelajaran }}</td>
                            <td>{{ $mapel->kelas }}</td>
                            <td>{{ $mapel->jurusan }}</td>
                            <td>{{ $mapel->icon}}</td>
                            <td>
                                <a href="/admin/mapel/{{$mapel->id}}/delete" class="btn btn-danger btn-sm"
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

    <!-- Modal Tambah Data Mapel -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="exampleModalLabel">Tambah Matapelajaran</h4>
      </div>
      <div class="modal-body">

        <form action="/admin/mapel/create" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}

            <div class="form-group">
                <h5>Kode Matapelajaran</h5>
                <input name="kd_mapel" type="text" class="form-control" id="#" aria-describedby="emailHelp" placeholder="Kode Matapelajaran">
            </div>

            <div class="form-group">
                <h5>Mata Pelajaran</h5>
                <input name="nama_pelajaran" type="text" class="form-control" id="#" aria-describedby="emailHelp" placeholder="Mata Pelajaran">
            </div>

            <div class="form-group">
                <h5>Kelas</h5>
                    <select name="kelas" class="form-control" id="kelas">
                    <option value="1">Kelas 1</option>
                    <option value="2">Kelas 2</option>
                    <option value="3">Kelas 3</option>
                    </select>
            </div>

            <div class="form-group">
                <h5>Jurusan</h5>
                    <select name="jurusan" class="form-control" id="jurusan">
                    <option value="Multimedia">Multimedia</option>
                    <option value="Akuntansi">Akuntansi</option>
                    <option value="Pemasaran">Pemasaran</option>
                    </select>
            </div>

            <div class="form-group">
                <h5>Semester</h5>
                    <select name="semester" class="form-control" id="semester">
                    <option value="Ganjil">Ganjil</option>
                    <option value="Genap">Genap</option>
                    </select>
            </div>

            <div class="form-group">
                    <h5>Kategori</h5>
                        <select name="kategori" class="form-control" id="kategori">
                        <option value="Umum">Umum</option>
                        <option value="Kejuruan">Kejuruan</option>
                        </select>
            </div>

            <div class="form-group">
                <label for="icon">Masukan Gambar Ikon</label>
                <input type="file" name="icon" id="icon" class="form-control">
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
