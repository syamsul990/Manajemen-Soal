@extends('guru.layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                            <div class="panel-heading">
								<h3 class="panel-title">Tambah Soal</h3>
                            </div>
                            <div class="panel-body">
                                <form action="/guru/soal/input" method="GET">

                                        <div class="form-group">
                                            <label for="">Jumlah Soal</label>
                                            <input type="number" class="form-control" name="jum_soal" placeholder="Masukan Jumlah Soal">    
                                        </div>
                                        <!--
                                        <div class="form-group">
                                                <label for="">Bobot Per Soal</label>
                                                <input type="number" class="form-control" name="jum_soal" placeholder="Masukan Bobot Soal">    
                                            </div>
                                        
                                        <div class="form-group">
                                            <label for="Jurusan">Kelas</label>
                                            <select name="kelas" class="form-control" id="Kelas">
                                            <option value="1">Kelas 1</option>
                                            <option value="2">Kelas 2</option>
                                            <option value="3">Kelas 3</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="Jurusan">Jurusan</label>
                                            <select name="jurusan" class="form-control" id="Jurusan">
                                            <option value="Multimedia">Multimedia</option>
                                            <option value="Akuntansi">Akuntansi</option>
                                            <option value="Pemasaran">Pemasaran</option>
                                            </select>
                                        </div>
                                    -->
                                    <br>
                                    <button class="btn btn-primary">Simpan</button>
                                 </form>
                            </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection