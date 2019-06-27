<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="{{ url('admins') }}" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-user"></i> <span>Siswa</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="{{ url('/admins/siswa/Multimedia') }}" class="">Multimedia</a></li>
									<li><a href="{{ url('/admins/siswa/Pemasaran') }}" class="">Pemasaran</a></li>
									<li><a href="{{ url('/admins/siswa/Akuntansi') }}" class="">Akuntansi</a></li>
								</ul>
							</div>
						</li>
						<li><a href="{{ url('/admins/pengajar') }}" class=""><i class="lnr lnr-user"></i> <span>Guru</span></a></li>
						<li><a href="{{ url('Setting') }}" class=""><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
					</ul>
				</nav>
			</div>
		</div>