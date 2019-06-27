@extends('guru.layouts.master')

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
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection