@extends('admins.layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                    <div class="panel">
								<div class="panel-heading">
                    <h3 class="panel-title">Data Siswa</h3>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
                        <th>NIS</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Action</th>
											</tr>
										</thead>
										<tbody>
                         @foreach($data_siswa as $siswa)
                        <tr>
                            <td>{{$siswa->NIS}}</td>
                            <td>{{$siswa->nama_lengkap}}</td>
                            <td>{{$siswa->jenis_kelamin}}</td>
                            <td>{{$siswa->kelas}}</td>
                            <td>{{$siswa->jurusan}}</td>
                            <td>
                                <a href="/admins/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                <a href="/admins/siswa/{{$siswa->id}}/delete" class="btn btn-danger btn-sm" 
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