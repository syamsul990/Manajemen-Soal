@extends('layouts.master_guru')

@section('content')
<div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Ubah Password</h3>
                            </div>
                            <div class="panel-body">

                            <form action="/layouts/{{ $user->id }}/resetPassword" method="POST">
                                @csrf

                                <div class="form-group">
                                        <label for="kelas">Password Lama</label>
                                        <input type="password" name="password_lama" class="form-control" placeholder="Password Lama">
                                </div>

                                <div class="form-group">
                                        <label for="kelas">Password Baru</label>
                                        <input type="password" name="password_baru" class="form-control"  placeholder="Password Baru">
                                </div>

                                <div class="form-group">
                                        <label for="kelas">Konfirmasi Password</label>
                                        <input type="password" name="konfirmasi_password" class="form-control" placeholder="Konfirmasi Password">
                                </div>
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

