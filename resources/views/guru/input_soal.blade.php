<<<<<<< HEAD
@extends('layouts.master_guru')
=======
@extends('guru.layouts.master')
>>>>>>> 33a8915fad837a6b55e6c4b9d80e25e5a3777af2

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

<<<<<<< HEAD
                            <form action="/guru/input_soal" method="GET">
                            <input type="hidden" name="jum_soal" value="{{$jum_soal}}">
                            @for ($i = 1;  $i<= $jum_soal; $i++)
                            <div class="form-group">
                                <label for="soal">Soal No. {{$i}}</label>
                                <textarea type="text" class="form-control" name="soal{{$i}}" row="3" placeholder="Masukan Soal"></textarea>
                            </div>
                            <div class="from-group">
                                <input name="jawaban1-soal{{$i}}" type="text" class="form-control"  placeholder="Jawaban a">
                                <br>
                            </div>
                            <div class="from-group">
                                <input name="jawaban2-soal{{$i}}" type="text" class="form-control"  placeholder="Jawaban b">
                                <br>
                            </div>
                            <div class="from-group">
                                <input name="jawaban3-soal{{$i}}" type="text" class="form-control"  placeholder="Jawaban c">
                                <br>
                            </div>
                            <div class="from-group">
                                <input name="jawaban4-soal{{$i}}" type="text" class="form-control"  placeholder="Jawaban d">
                                <br>
                            </div>
                            <div class="from-group">
                                <input name="jawaban_benar-soal{{$i}}" type="text" class="form-control"  placeholder="Jawaban Benar">
                                <br>
                            </div>
                            @endfor
                                <button class="btn btn-primary" type="submit">Simpan</button>
                                <a class="btn btn-default btn-close" href="{{ route('home') }}">Cancel</a>
=======
                            <form action="">
                            @for ($i = 1;  $i< $jum_soal; $i++)
                            <div class="form-group">
                                <label for="Jurusan">Soal No. {{$i}}</label>
                                <textarea type="text" class="form-control" name="soal{{$i}}" row="3" placeholder="Masukan Soal"></textarea>
                            </div>
                            <div class="from-group">
                                <input type="text" class="form-control"  placeholder="Jawaban a">
                                <br>
                            </div>
                            <div class="from-group">
                                <input type="text" class="form-control"  placeholder="Jawaban b">
                                <br>
                            </div>
                            <div class="from-group">
                                <input type="text" class="form-control"  placeholder="Jawaban c">
                                <br>
                            </div>
                            <div class="from-group">
                                <input type="text" class="form-control"  placeholder="Jawaban d">
                                <br>
                            </div>
                            <div class="from-group">
                                <input type="text" class="form-control"  placeholder="Jawaban Benar">
                                <br>
                            </div>
                            @endfor
                                <button class="btn btn-primary" type="submit">Simpan</button>   
>>>>>>> 33a8915fad837a6b55e6c4b9d80e25e5a3777af2
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> 33a8915fad837a6b55e6c4b9d80e25e5a3777af2
