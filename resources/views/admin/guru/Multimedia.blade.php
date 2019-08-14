@extends('layouts.master_admin')

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

                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                Tambah Guru
                </button>

                <div class="row">
                    <div class="col-md-12">
                    <div class="panel">
								<div class="panel-heading">
                    <h3 class="panel-title">Data Guru</h3>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
                        <th>NIP</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Mengajar</th>
                        <th>Email</th>
                        <th>Action</th>
											</tr>
										</thead>
										<tbody>
                    @foreach($data_guru as $guru)
                        <tr>
                            <td>{{ $guru->NIP }}</td>
                            <td>{{ $guru->name }}</td>
                            <td>{{ $guru->jenis_kelamin }}</td>
                            <td>{{ $guru->kelas }}</td>
                            <td>{{ $guru->jurusan }}</td>
                            <td>{{ $guru->nama_pelajaran }}</td>
                            <td>{{ $guru->email }}</td>
                            <td>
                                <a href="/admin/guru/{{$guru->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                <a href="/admin/guru/{{$guru->id}}/delete" class="btn btn-danger btn-sm"
                                onclick="return confirm('Apakah Anda Yakin ?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
										</tbody>
                                    </table>
                                </div>
                            </div>
                            {!! $data_guru->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
