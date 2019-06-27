@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">

<form action="/guru/soal/input" method="GET">
    <input type="number" class="form-control" name="jum_soal" placeholder="jumlah soal">
    <button class="btn btn-primary">Simpan</button>
</form>
        </div>
    </div>
</div>
@endsection