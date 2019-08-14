@extends('layouts.master_admin')
@section('content')
<div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                            <a href="/admin/nilai/Multimedia/kelas1" class="btn btn-primary float-right">Kelas 1</a>
                            <a href="/admin/nilai/Multimedia/kelas2" class="btn btn-primary float-right">Kelas 2</a>
                            <a href="/admin/nilai/Multimedia/kelas3" class="btn btn-primary float-right">Kelas 3</a>
                        <div class="panel">
							<div class="panel-heading">
                                <h3 class="panel-title">Data Nilai Siswa</h3>
							</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
                                                    <th>NIS</th>
                                                    {{--  <th>Nama Lengkap</th>  --}}
                                                    <th>Matapelajaran</th>
                                                    <th>Jenis Ujian</th>
                                                    <th>Nilai</th>
                                                    <th>Kelas</th>
                                                    <th>Semester</th>
                                            </tr>
                                        </thead>
                                            <tbody>
                                                     @foreach($data_nilai3 as $nilai)
                                            <tr>
                                                        <td>{{$nilai->NIS}}</td>
                                                        {{--  <td>{{$nilai->name}}</td>  --}}
                                                        <td>{{$nilai->kd_mapel}}</td>
                                                        <td>{{$nilai->jenis_ujian}}</td>
                                                        <td>{{$nilai->nilai}}</td>
                                                        <td>{{$nilai->kelas}}</td>
                                                        <td>{{$nilai->semester}}</td>
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


@endsection
