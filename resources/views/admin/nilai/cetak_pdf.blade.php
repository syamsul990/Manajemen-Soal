<!DOCTYPE html>
<html>
<head>
	<title>Nilai Ujian Online SMKN 1 Kedawung</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Hasil Nilai Ujian Online</h4>
	</center>

	<table class='table table-bordered'>
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
                                                     @foreach($data_nilai1 as $nilai)
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
									<</tbody>
                                </table>

                            </body>
                            </html>
