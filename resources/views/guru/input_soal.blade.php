@extends('layouts.master_guru')

@section('content')
<div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Masukan Soal</h3>
                            </div>
                            <div class="panel-body">

                            <form action="/guru/input_soal" method="POST" enctype="multipart/form-data">
                                @csrf
                            <div class="form-group">
                                <label for="kd_mapel">Kode Mata Pelajaran</label>
                                 <input type="text" class="form-control" name="kd_mapel" value="{{$kd_mapel}}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="jum_soal">Jumlah Soal</label>
                                <input type="text" class="form-control" name="jum_soal" value="{{$jum_soal}}" readonly>
                            </div>

                            <div class="form-group">
                                    <label for="ujian">Jenis Ujian</label>
                                    <select name="ujian" class="form-control" id="ujian">
                                    <option value="UAS">Ujian Akhir Semester</option>
                                    <option value="UTS">Ujian Tengah Semester</option>
                                    </select>
                            </div>

                            @for ($i = 1;  $i<= $jum_soal; $i++)
                            <div class="form-group">
                                <label for="soal">Soal No. {{$i}}</label>
                                <textarea  class="form-control" name="soal{{$i}}" row="10" cols="50" placeholder="Masukan Soal">

                                </textarea>
                                <script>

                                        CKEDITOR.replace( "soal{{$i}}");
                                </script>
                            </div>

                            <div class="form-group">
                                <label for="image">Masukan Gambar</label>
                                <input type="file" name="image{{$i}}" id="image" class="form-control">
                            </div>

                            <div class="from-group">
                                <label for="jawaban1">Jawaban A</label>
                                <input name="jawaban1-soal{{$i}}" type="text" class="form-control"  placeholder="Jawaban a">
                                <br>
                            </div>

                            <div class="from-group">
                                    <label for="jawaban2">Jawaban B</label>
                                <input name="jawaban2-soal{{$i}}" type="text" class="form-control"  placeholder="Jawaban b">
                                <br>
                            </div>

                            <div class="from-group">
                                    <label for="jawaban3">Jawaban C</label>
                                <input name="jawaban3-soal{{$i}}" type="text" class="form-control"  placeholder="Jawaban c">
                                <br>
                            </div>

                            <div class="from-group">
                                    <label for="jawaban4">Jawaban D</label>
                                <input name="jawaban4-soal{{$i}}" type="text" class="form-control"  placeholder="Jawaban d">
                                <br>
                            </div>

                            <div class="form-group">
                                <label for="jawaban_benar">Jenis Ujian</label>
                                <select name="jawaban_benar-soal{{$i}}" class="form-control" id="jawaban_benar">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                </select>
                            </div>


                            @endfor
                                <button class="btn btn-primary" type="submit">Simpan</button>
                                <a class="btn btn-default btn-close" href="{{ route('home') }}">Cancel</a>

                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

