@extends('layouts.master_admin')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
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
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                        Tambah Siswa
                </button>

                <div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Overview</h3>
							<p class="panel-subtitle">SMKN 1 Kedawung </p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-user"></i></span>
										<p>
											<span class="number">{{ App\Siswa::all()->count() }}</span>
											<span class="title">Total Siswa</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-user"></i></span>
										<p>
											<span class="number">{{ App\Guru::all()->count() }}</span>
											<span class="title">Total Guru</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-book"></i></span>
										<p>
											<span class="number">{{ App\Mapel::all()->count() }}</span>
											<span class="title">Matapelajaran</span>
										</p>
									</div>
								</div>

								</div>
							</div>
						</div>
					</div>
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

            <form action="/admin/siswa/create" method="POST">
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
                    <h5>Email</h5>
                        <input name="email" type="text" class="form-control" id="#" aria-describedby="emailHelp" placeholder="email">
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
                <div class="form-group">
                    <h5>Semester</h5>
                        <select name="semester" class="form-control" id="exampleFormControlSelect1">
                        <option value="Ganjil">Ganjil</option>
                        <option value="Genap">Genap</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <h5>Tahun Angkatan</h5>
                        <input name="thn_angkatan" type="text" class="form-control" id="#"  placeholder="Tahun Angkatan">
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


