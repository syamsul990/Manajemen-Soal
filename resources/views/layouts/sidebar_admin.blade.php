<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="{{ url('home') }}" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                <li>
                    <a href="#subSiswa" data-toggle="collapse" class="collapsed"><i class="lnr lnr-user"></i> <span>Siswa</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subSiswa" class="collapse ">
                        <ul class="nav">
                            <li><a href="{{ url ('/admin/siswa/Pemasaran') }}" class="">Pemasaran</a></li>
                            <li><a href="{{ url ('/admin/siswa/Multimedia') }}" class="">Multimedia</a></li>
                            <li><a href="{{ url ('/admin/siswa/Akuntansi') }}" class="">Akuntansi</a></li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#subGuru" data-toggle="collapse" class="collapsed"><i class="lnr lnr-user"></i> <span>guru</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subGuru" class="collapse ">
                        <ul class="nav">
                            <li><a href="{{ url ('/admin/guru/Pemasaran') }}" class="">Pemasaran</a></li>
                            <li><a href="{{ url ('/admin/guru/Multimedia') }}" class="">Multimedia</a></li>
                            <li><a href="{{ url ('/admin/guru/Akuntansi') }}" class="">Akuntansi</a></li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#subMapel" data-toggle="collapse" class="collapsed"><i class="lnr lnr-user"></i> <span>Mata Pelajaran</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subMapel" class="collapse ">
                        <ul class="nav">
                            <li><a href="{{ url ('/admin/mapel') }}" class="">Umum</a></li>
                            <li><a href="{{ url ('/admin/mapel/kejuruan') }}" class="">Kejuruan</a></li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#subNilai" data-toggle="collapse" class="collapsed"><i class="lnr lnr-user"></i> <span>Nilai</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subNilai" class="collapse ">
                        <ul class="nav">
                            <li><a href="{{ url ('/admin/nilai/Pemasaran/kelas1'  ) }}" class="">Pemasaran</a></li>
                            <li><a href="{{ url ('/admin/nilai/Multimedia/kelas1'  ) }}" class="">Multimedia</a></li>
                            <li><a href="{{ url ('/admin/nilai/Akuntansi/kelas1'  ) }}" class="">Akuntansi</a></li>
                        </ul>
                    </div>
                </li>

            </ul>
        </nav>
    </div>
</div>
