@extends('layouts.master_guru')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Daftar Soal</h3>
                            </div>
                            <div class="panel-body">

                                <form action="/admin/guru/soal" method="POST">
                                {{csrf_field()}}
                                <div class="container-fluid">
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
                                                    <th>Nomor</th>
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
                                                        <td>{{ $->NIP }}</td>
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

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
