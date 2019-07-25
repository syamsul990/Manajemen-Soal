<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="{{ url('home') }}" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                <li>
                    <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-user"></i> <span>Siswa</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subPages" class="collapse ">
                        <ul class="nav">
                            <li><a href="{{ url ('/admin/siswa/Pemasaran') }}" class="">Pemasaran</a></li>
                            <li><a href="{{ url ('/admin/siswa/Multimedia') }}" class="">Multimedia</a></li>
                            <li><a href="{{ url ('/admin/siswa/Akuntansi') }}" class="">Akuntansi</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="{{ url('/admin/guru') }}" class=""><i class="lnr lnr-user"></i> <span>Guru</span></a></li>
                <li><a href="{{ url('/admin/mapel') }}" class=""><i class="lnr lnr-book"></i> <span>Matapelajaran</span></a></li>
            </ul>
        </nav>
    </div>
</div>
