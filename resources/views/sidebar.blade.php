<div class="sidebar-menu">
	<ul id="accordion-menu">
		<!-- <li class="dropdown">
			<a href="javascript:;" class="dropdown-toggle">
				<span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
			</a>
			<ul class="submenu">
				<li><a class="breadcrumb-item @yield('home')" href="{{route('index.index')}}">Home</a></li>
				<li><a class="breadcrumb-item @yield('analisa')" href="{{route('analisa.index')}}">Analisis</a></li>
			</ul>
		</li> -->
		<li class="dropdown">
			<a href="{{route('dashboard.index')}}" class="dropdown-toggle">
				<span class="micon dw dw-house-1 @yield('dashboard')"></span><span class="mtext">Dashboard</span>
			</a>
		</li>
		<li class="dropdown">
			<a href="javascript:;" class="dropdown-toggle">
				<span class="micon dw dw-library"></span><span class="mtext">Data Master</span>
			</a>
			<ul class="submenu">
				<li><a class="breadcrumb-item @yield('karyawan')" href="{{route('data_pegawai.index')}}">Data Karyawan</a></li>
				<li><a class="breadcrumb-item @yield('kriteria')" href="{{route('kriteria.index')}}">Data Kriteria</a></li>
			</ul>
		</li>
		<li class="dropdown">
			<a href="javascript:;" class="dropdown-toggle">
				<span class="micon dw dw-clipboard"></span><span class="mtext">Administrasi Karyawan</span>
			</a>
			<ul class="submenu">
				<li><a class="breadcrumb-item @yield('absensi')" href="{{route('jadwal.index')}}">Data Absensi</a></li>
				<li><a class="breadcrumb-item @yield('kerjasama')" href="{{route('kerjasama.index')}}">Data Nilai Kejasama</a></li>
				<li><a class="breadcrumb-item @yield('sikap')" href="{{route('sikapkerja.index')}}">Data Nilai sikap Kerja</a></li>
				<li><a class="breadcrumb-item @yield('improve')" href="{{route('skill.index')}}">Data Skill Improve</a></li>
			</ul>
		</li>
        <li class="dropdown">
			<a href="javascript:;" class="dropdown-toggle">
				<span class="micon dw dw-file"></span><span class="mtext">Laporan</span>
			</a>
			<ul class="submenu">
                <li><a class="breadcrumb-item @yield('laporan-karyawan')" href="{{route('laporan.karyawan.index')}}">Karyawan</a></li>
				<li><a class="breadcrumb-item @yield('laporan-perhitungan')" href="{{route('laporan.perhitungan.index')}}">Perhitungan</a></li>
				<li><a class="breadcrumb-item @yield('laporan-perangkingan')" href="{{route('laporan.perangkingan.index')}}">Perangkingan</a></li>

			</ul>
		</li>
	</ul>
</div>
