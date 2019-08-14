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
                    <h3 class="panel-title">Data Matapelajaran Kejuruan</h3>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
                        <th>Kode Mapel</th>
                        <th>Mata Pelajaran</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
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
@stop
