@php
$menu_open =
Request::is('parameterjeniskelamins*') ||
Request::is('setting*') ||
Request::is('parameterstatuskawins*') ||
Request::is('jenispekerjaans*') ||
Request::is('pendidikans*') ||
Request::is('dusuns*') ||
Request::is('agamas*');
@endphp
<li class="treeview {{ $menu_open ? 'menu-open' : '' }}">
	<a href="#">
		<i class="fa fa-database"></i>
		<span>Master Data</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
	<ul class="treeview-menu" style="display: {{ $menu_open ? 'block' : 'none' }}">
		<li class="{{ Request::is('parameterjeniskelamins*') ? 'active' : '' }}">
			<a href="{!! route('parameterjeniskelamins.index') !!}"><i class="fa fa-circle-o"></i>Jenis Kelamin</a>
		</li>
		<li class="{{ Request::is('setting*') ? 'active' : '' }}">
			<a href="{!! route('setting.index') !!}"><i class="fa fa-circle-o"></i>Setting Table</a>
		</li>
		<li class="{{ Request::is('parameterstatuskawins*') ? 'active' : '' }}">
			<a href="{!! route('parameterstatuskawins.index') !!}"><i class="fa fa-circle-o"></i>Status Kawin</a>
		</li>
		<li class="{{ Request::is('jenispekerjaans*') ? 'active' : '' }}">
			<a href="{!! route('jenispekerjaans.index') !!}"><i class="fa fa-circle-o"></i>Jenis Pekerjaan</a>
		</li>
		<li class="{{ Request::is('pendidikans*') ? 'active' : '' }}">
			<a href="{!! route('pendidikans.index') !!}"><i class="fa fa-circle-o"></i>Pendidikan</a>
		</li>
		<li class="{{ Request::is('dusuns*') ? 'active' : '' }}">
			<a href="{!! route('dusuns.index') !!}"><i class="fa fa-circle-o"></i>Dusun</a>
		</li>
		<li class="{{ Request::is('agamas*') ? 'active' : '' }}">
			<a href="{!! route('agamas.index') !!}"><i class="fa fa-circle-o"></i>Agama</a>
		</li>
	</ul>
</li>

@php
$menu_open =
Request::is('potensiPertambangans*') ||
Request::is('perkebunans*') ||
Request::is('peternakans*') ||
Request::is('perikanans*') ||
Request::is('dataBudiDayaHutans*') ||
Request::is('dataUkms*') ||
Request::is('datawarung*');
@endphp
<li class="treeview {{ $menu_open ? 'menu-open' : '' }}">
	<a href="#">
		<i class="fa fa-bar-chart"></i>
		<span>Data Ekonomi</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
	<ul class="treeview-menu" style="display: {{ $menu_open ? 'block' : 'none' }}">
		@php
		$menu_open = Request::is('potensiPertambangans*');
		@endphp
		<li class="treeview {{ $menu_open ? 'menu-open active' : '' }}" >
			<a href="#">
				<i class="fa fa-circle-o"></i>
				<span>Data Pertambangan</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu" style="display: {{ $menu_open ? 'block' : 'none' }}">
				<li class="{{ Request::is('potensiPertambangans*') ? 'active' : '' }}">
					<a href="{!! route('potensiPertambangans.index') !!}"><i class="fa fa-circle-o"></i><span>Potensi Pertambangan</span></a>
				</li>
			</ul>
		</li>
		@php
		$menu_open =
		Request::is('perkebunans*') ||
		Request::is('peternakans*') ||
		Request::is('perikanans*');
		@endphp
		<li class="treeview {{ $menu_open ? 'menu-open active' : '' }}" >
			<a href="#">
				<i class="fa fa-circle-o"></i>
				<span>Data Pertanian</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu">
				<li class="{{ Request::is('perkebunans*') ? 'active' : '' }}">
					<a href="{!! route('perkebunans.index') !!}"><i class="fa fa-circle-o"></i><span>Perkebunan</span></a>
				</li>
				<li class="{{ Request::is('peternakans*') ? 'active' : '' }}">
					<a href="{!! route('peternakans.index') !!}"><i class="fa fa-circle-o"></i><span>Peternakan</span></a>
				</li>
				<li class="{{ Request::is('perikanans*') ? 'active' : '' }}">
					<a href="{!! route('perikanans.index') !!}"><i class="fa fa-circle-o"></i><span>Perikanan</span></a>
				</li>
			</ul>
		</li>
		<li class="{{ Request::is('dataBudiDayaHutans*') ? 'active' : '' }}">
			<a href="{!! route('dataBudiDayaHutans.index') !!}"><i class="fa fa-circle-o"></i> Data Budi daya Hutan</a>
		</li>
		<li class="{{ Request::is('dataUkms*') ? 'active' : '' }}">
			<a href="{!! route('dataUkms.index') !!}"><i class="fa fa-circle-o"></i> Data UKM & IRT</a>
		</li>
		<li class="{{ Request::is('datawarung*') ? 'active' : '' }}">
			<a href="{!! route('datawarung.index') !!}"><i class="fa fa-circle-o"></i> Data Warung & Grosir</a>
		</li>
	</ul>
</li>

{{-- BATAS SIDEBAR DATA EKONOMI --}}
@php
$menu_open =
Request::is('rutilahus*') ||
Request::is('penyakitmenular*') ||
Request::is('angkaPutusSekolahs*') ||
Request::is('bencanaalam*');
@endphp
<li class="treeview {{ $menu_open ? 'menu-open' : '' }}">
	<a href="#">
		<i class="fa fa-th"></i>
		<span>Data Sosial</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
	<ul class="treeview-menu" style="display: {{ $menu_open ? 'block' : 'none' }}">
		<li class="{{ Request::is('rutilahus*') ? 'active' : '' }}">
			<a href="{!! route('rutilahus.index') !!}"><i class="fa fa-circle-o"></i> Rutilahu</a>
		</li>
		<li class="{{ Request::is('penyakitmenular*') ? 'active' : '' }}">
			<a href="{!! route('penyakitmenular.index') !!}"><i class="fa fa-circle-o"></i> Penyakit Menular</a>
		</li>
		<li class="{{ Request::is('angkaPutusSekolahs*') ? 'active' : '' }}">
			<a href="{!! route('angkaPutusSekolahs.index') !!}"><i class="fa fa-circle-o"></i> Angka Putus Sekolah</a>
		</li>
		<li class="{{ Request::is('bencanaalam*') ? 'active' : '' }}">
			<a href="{!! route('bencanaalam.index') !!}"><i class="fa fa-circle-o"></i> Bencana Alam</a>
		</li>
	</ul>
</li>

{{-- BATAS SIDEBAR DATA SOSIAL --}}
@php
$menu_open =
Request::is('datapenduduks*') ||
Request::is('penduduklahirs*') ||
Request::is('pendudukmeninggals*') ||
Request::is('pendudukpindahs*');
@endphp
<li class="treeview {{ $menu_open ? 'menu-open' : '' }}">
	<a href="#">
		<i class="fa fa-users"></i>
		<span>Data Kependudukan</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
	<ul class="treeview-menu" style="display: {{ $menu_open ? 'block' : 'none' }}">
		<li class="{{ Request::is('datapenduduks*') ? 'active' : '' }}">
			<a href="{!! route('datapenduduks.index') !!}"><i class="fa fa-circle-o"></i>Data Penduduk</a>
		</li>
		<li class="{{ Request::is('penduduklahirs*') ? 'active' : '' }}">
			<a href="{!! route('penduduklahirs.index') !!}"><i class="fa fa-circle-o"></i>Penduduk Lahir</a>
		</li>
		<li class="{{ Request::is('pendudukmeninggals*') ? 'active' : '' }}">
			<a href="{!! route('pendudukmeninggals.index') !!}"><i class="fa fa-circle-o"></i>Penduduk Meninggal</a>
		</li>
		<li class="{{ Request::is('pendudukpindahs*') ? 'active' : '' }}">
			<a href="{!! route('pendudukpindahs.index') !!}"><i class="fa fa-circle-o"></i>Penduduk Pindah</a>
		</li>
	</ul>
</li>

@php
$menu_open =
Request::is('rencanapembangunans*') ||
Request::is('kegiatanpembangunans*') ||
Request::is('inventarisproyeks*') ||
Request::is('kaderpembangunans*');
@endphp
<li class="treeview {{ $menu_open ? 'menu-open' : '' }}">
	<a href="#">
		<i class="fa fa-building"></i>
		<span>Data Pembangunan</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
	<ul class="treeview-menu" style="display: {{ $menu_open ? 'block' : 'none' }}">
		<li class="{{ Request::is('rencanapembangunans*') ? 'active' : '' }}">
			<a href="{!! route('rencanapembangunans.index') !!}"><i class="fa fa-circle-o"></i>Rencana Pembangunan</a>
		</li>
		<li class="{{ Request::is('kegiatanpembangunans*') ? 'active' : '' }}">
			<a href="{!! route('kegiatanpembangunans.index') !!}"><i class="fa fa-circle-o"></i>Kegiatan Pembangunan</a>
		</li>
		<li class="{{ Request::is('inventarisproyeks*') ? 'active' : '' }}">
			<a href="{!! route('inventarisproyeks.index') !!}"><i class="fa fa-circle-o"></i>Inventaris Proyek</a>
		</li>
		<li class="{{ Request::is('kaderpembangunans*') ? 'active' : '' }}">
			<a href="{!! route('kaderpembangunans.index') !!}"><i class="fa fa-circle-o"></i>Kader Pembangunan</a>
		</li>
	</ul>
</li>

@php
$menu_open =
Request::is('suratpengantarktps*') ||
Request::is('suratpengantarkks*') ||
Request::is('formpengajuankk*') ||
Request::is('suratpindah*') ||
Request::is('suratketerangantidakmampus*') ||
Request::is('suratketerangandomisilis*') ||
Request::is('keterangan-kelahiran*') ||
Request::is('keterangan-menikah*') ||
Request::is('keterangan-usaha-baru*') ||
Request::is('suratketeranganskcks*') ||
Request::is('suratketeranganusahas*') ||
Request::is('suratketeranganpenguasaantanahs*') ||
Request::is('suratketeranganlainnyas*');
@endphp
<li class="treeview {{ $menu_open ? 'menu-open' : '' }}">
	<a href="#">
		<i class="fa fa-envelope"></i>
		<span>Surat</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
	<ul class="treeview-menu" style="display: {{ $menu_open ? 'block' : 'none' }}">
		<li class="{{ Request::is('suratpengantarktps*') ? 'active' : '' }}">
			<a href="{!! route('suratpengantarktps.index') !!}"><i class="fa fa-circle-o"></i> Pengantar KTP</a>
		</li>
		<li class="{{ Request::is('suratpengantarkks*') ? 'active' : '' }}">
			<a href="{!! route('suratpengantarkks.index') !!}"><i class="fa fa-circle-o"></i> Pengantar KK</a>
		</li>
		<li class="{{ Request::is('formpengajuankk*') ? 'active' : '' }}">
			<a href="{!! route('formpengajuankk.index') !!}"><i class="fa fa-circle-o"></i> Pengajuan KK</a>
		</li>
		<!--surat pindah=dodi-->
		<li class="{{ Request::is('suratpindah*') ? 'active' : '' }}">
			<a href="{!! route('suratpindah.index') !!}"><i class="fa fa-circle-o"></i> Pengantar Pindah</a>
		</li>
		<li class="{{ Request::is('suratketerangantidakmampus*') ? 'active' : '' }}">
			<a href="{!! route('suratketerangantidakmampus.index') !!}"><i class="fa fa-circle-o"></i> Keterangan Tidak Mampu</a>
		</li>
		<li class="{{ Request::is('suratketerangandomisilis*') ? 'active' : '' }}">
			<a href="{!! route('suratketerangandomisilis.index') !!}"><i class="fa fa-circle-o"></i> Keterangan Domisili</a>
		</li>
		<li class="{{ Request::is('keterangan-kelahiran*') ? 'active' : '' }}">
			<a href="{!! route('keterangan-kelahiran.index') !!}"><i class="fa fa-circle-o"></i> Keterangan Kelahiran</a>
		</li>
		<li class="{{ Request::is('keterangan-menikah*') ? 'active' : '' }}">
			<a href="{!! route('keterangan-menikah.index') !!}"><i class="fa fa-circle-o"></i> Keterangan Menikah</a>
		</li>
		<li class="{{ Request::is('keterangan-penghasilan*') ? 'active' : '' }}">
			<a href="{!! route('keterangan-penghasilan.index') !!}"><i class="fa fa-circle-o"></i> Keterangan Penghasilan</a>
		</li>
		<li class="{{ Request::is('keterangan-usaha-baru*') ? 'active' : '' }}">
			<a href="{!! route('keterangan-usaha-baru.index') !!}"><i class="fa fa-circle-o"></i> Usaha Baru</a>
		</li>
		<li class="{{ Request::is('suratketeranganskcks*') ? 'active' : '' }}">
			<a href="{!! route('suratketeranganskcks.index') !!}"><i class="fa fa-circle-o"></i> Keterangan SKCK</a>
		</li>
		<li class="{{ Request::is('suratketeranganusahas*') ? 'active' : '' }}">
			<a href="{!! route('suratketeranganusahas.index') !!}"><i class="fa fa-circle-o"></i> Keterangan Usaha</a>
		</li>
		<li class="{{ Request::is('suratketeranganpenguasaantanahs*') ? 'active' : '' }}">
			<a href="{!! route('suratketeranganpenguasaantanahs.index') !!}"><i class="fa fa-circle-o"></i>Keterangan Penguasaan <p style="margin-left:17px">Tanah</p></a>
		</li>
		<li class="{{ Request::is('suratketeranganlainnyas*') ? 'active' : '' }}">
			<a href="{!! route('suratketeranganlainnyas.index') !!}"><i class="fa fa-circle-o"></i> Keterangan Lainnya</a>
		</li>
		{{-- <li class="{{ Request::is('suratketerangandesas*') ? 'active' : '' }}">
			<a href="{!! route('suratketerangandesas.index') !!}"><i class="fa fa-circle-o"></i> Keterangan Desa</a>
		</li> --}}
	</ul>
</li>
<!--<li class="treeview">
    <a href="#">
        <i class="fa fa-file"></i>
        <span>Administrasi Umum</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('adumagenda') ? 'active' : '' }}">
            <a href="{!! route('adumagenda') !!}"><i class="fa fa-circle-o"></i><span>Buku Agenda</span></a>
        </li>
        <li class="{{ Request::is('ekspedisi') ? 'active' : '' }}">
            <a href="{!! route('ekspedisi') !!}"><i class="fa fa-circle-o"></i><span>Ekspedisi Desa</span></a>
        </li>
        <li class="{{ Request::is('lember') ? 'active' : '' }}">
            <a href="{!! route('lember') !!}"><i class="fa fa-circle-o"></i><span>Lembaran & Berita Desa</span></a>
        </li>
    </ul>
</li>-->

@php
$menu_open =
Request::is('keputusanbpds*') ||
Request::is('anggotabpds*') ||
Request::is('kegiatanbpds*') ||
Request::is('agendabpds*') ||
Request::is('dataekspedisis*');
@endphp
<li class="treeview {{ $menu_open ? 'menu-open' : '' }}">
	<a href="#">
		<i class="fa fa-users"></i>
		<span>Admin BPD</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
	<ul class="treeview-menu" style="display: {{ $menu_open ? 'block' : 'none' }}">
		<li class="{{ Request::is('keputusanbpds*') ? 'active' : '' }}">
			<a href="{!! route('keputusanbpds.index') !!}"><i class="fa fa-circle-o"></i><span>Keputusan BPD</span></a>
		</li>
		<li class="{{ Request::is('anggotabpds*') ? 'active' : '' }}">
			<a href="{!! route('anggotabpds.index') !!}"><i class="fa fa-circle-o"></i><span>Anggota BPD</span></a>
		</li>
		<li class="{{ Request::is('kegiatanbpds*') ? 'active' : '' }}">
			<a href="{!! route('kegiatanbpds.index') !!}"><i class="fa fa-circle-o"></i><span>Kegiatan BPD</span></a>
		</li>
		<li class="{{ Request::is('agendabpds*') ? 'active' : '' }}">
			<a href="{!! route('agendabpds.index') !!}"><i class="fa fa-circle-o"></i><span>Agenda BPD</span></a>
		</li>
		<li class="{{ Request::is('dataekspedisis*') ? 'active' : '' }}">
			<a href="{!! route('dataekspedisis.index') !!}"><i class="fa fa-circle-o"></i><span>Data Ekspedisi</span></a>
		</li>
	</ul>
</li>

@php
$menu_open =
Request::is('datasuratmasuks*') ||
Request::is('datasuratkeluars*');
@endphp
<li class="treeview {{ $menu_open ? 'menu-open' : '' }}">
	<a href="#">
		<i class="fa fa-exchange"></i>
		<span>Arsip Surat</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
	<ul class="treeview-menu" style="display: {{ $menu_open ? 'block' : 'none' }}">
		<li>
			<a href="https://srv46.niagahoster.com:2096/cpsess1182995190/webmail/paper_lantern/index.html?login=1&post_login=28488472558971"><i class="fa fa-circle-o"></i>Email Masuk</a>
		</li>
		<li class="{{ Request::is('datasuratmasuks*') ? 'active' : '' }}">
			<a href="{!! route('datasuratmasuks.index') !!}"><i class="fa fa-circle-o"></i><span>Data Surat Masuk</span></a>
		</li>
		<li class="{{ Request::is('datasuratkeluars*') ? 'active' : '' }}">
			<a href="{!! route('datasuratkeluars.index') !!}"><i class="fa fa-circle-o"></i><span>Data Surat Keluar</span></a>
		</li>
	</ul>
</li>

@php
$menu_open =
Request::is('pajaktanahs*');
@endphp
<li class="treeview {{ $menu_open ? 'menu-open' : '' }}">
	<a href="#">
		<i class="fa fa-percent"></i>
		<span>PBB</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
	<ul class="treeview-menu" style="display: {{ $menu_open ? 'block' : 'none' }}">
		<li class="{{ Request::is('pajaktanahs*') ? 'active' : '' }}">
			<a href="{!! route('pajaktanahs.index') !!}"><i class="fa fa-circle-o"></i>Pajak Tanah</a>
		</li>
	</ul>
</li>

<!--<li class="treeview">
    <a href="#">
        <i class="fa fa-pie-chart"></i>
        <span>Statistik</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{!! route('statistik.pendidikan') !!}"><i class="fa fa-circle-o"></i> Statistik Pendidikan</a></li>
        <li><a href="{!! route('statistik.pekerjaan') !!}"><i class="fa fa-circle-o"></i> Statistik Pekerjaan</a></li>
        <li><a href="{!! route('statistik.perkawinan') !!}"><i class="fa fa-circle-o"></i> Statistik Status Perkawinan</a></li>
        <li><a href="{!! route('statistik.agama') !!}"><i class="fa fa-circle-o"></i> Statistik Agama</a></li>
    </ul>
</li>-->

@php
$menu_open =
Request::is('puskesmas*') ||
Request::is('posyandu*') ||
Request::is('bidan*') ||
Request::is('klinik*') ||
Request::is('rumahsakit*') ||
Request::is('tk*') ||
Request::is('paud*') ||
Request::is('sd*') ||
Request::is('smp*') ||
Request::is('sma*') ||
Request::is('paket*') ||
Request::is('madrasah*') ||
Request::is('pt*') ||
Request::is('masjid*') ||
Request::is('mushola*') ||
Request::is('majlis*') ||
Request::is('perpustakaan*');
@endphp
<li class="treeview {{ $menu_open ? 'menu-open' : '' }}">
	<a href="#">
		<i class="fa fa-building"></i>
		<span>Sarana & Prasarana</span>
		<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		</span>
	</a>
	<ul class="treeview-menu" style="display: {{ $menu_open ? 'block' : 'none' }}">
		@php
		$menu_open =
		Request::is('puskesmas*') ||
		Request::is('posyandu*') ||
		Request::is('bidan*') ||
		Request::is('klinik*') ||
		Request::is('rumahsakit*');
		@endphp
		<li class="treeview {{ $menu_open ? 'menu-open active' : '' }}" >
			<a href="#">
				<i class="fa fa-plus-square"></i>
				<span>Kesehatan</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu" style="display: {{ $menu_open ? 'block' : 'none' }}">
				<li class="{{ Request::is('puskesmas*') ? 'active' : '' }}">
					<a href="{!! route('puskesmas.index') !!}"><i class="fa fa-circle-o"></i><span>Puskesmas</span></a>
				</li>
				<li class="{{ Request::is('posyandu*') ? 'active' : '' }}">
					<a href="{!! route('posyandu.index') !!}"><i class="fa fa-circle-o"></i> <span>Posyandu</span></a>
				</li>
				<li class="{{ Request::is('bidan*') ? 'active' : '' }}">
					<a href="{!! route('bidan.index') !!}"><i class="fa fa-circle-o"></i> <span>Bidan</span></a>
				</li>
				<li class="{{ Request::is('klinik*') ? 'active' : '' }}">
					<a href="{!! route('klinik.index') !!}"><i class="fa fa-circle-o"></i> <span>Klinik</span></a>
				</li>
				<li class="{{ Request::is('rumahsakit*') ? 'active' : '' }}">
					<a href="{!! route('rumahsakit.index') !!}"><i class="fa fa-circle-o"></i> <span>Rumah Sakit</span></a>
				</li>
			</ul>
		</li>
		@php
		$menu_open =
		Request::is('tk*') ||
		Request::is('paud*') ||
		Request::is('sd*') ||
		Request::is('smp*') ||
		Request::is('sma*') ||
		Request::is('paket*') ||
		Request::is('madrasah*') ||
		Request::is('pt*');
		@endphp
		<li class="treeview {{ $menu_open ? 'menu-open active' : '' }}">
			<a href="#">
				<i class="fa fa-graduation-cap"></i>
				<span>Pendidikan</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu" style="display: {{ $menu_open ? 'block' : 'none' }}">
				<li class="{{ Request::is('tk*') ? 'active' : '' }}">
					<a href="{!! route('tk.index') !!}"><i class="fa fa-circle-o"></i><span>TK</span></a>
				</li>
				<li class="{{ Request::is('paud*') ? 'active' : '' }}">
					<a href="{!! route('paud.index') !!}"><i class="fa fa-circle-o"></i> <span>PAUD</span></a>
				</li>
				<li class="{{ Request::is('sd*') ? 'active' : '' }}">
					<a href="{!! route('sd.index') !!}"><i class="fa fa-circle-o"></i> <span>SD/MI</span></a>
				</li>
				<li class="{{ Request::is('smp*') ? 'active' : '' }}">
					<a href="{!! route('smp.index') !!}"><i class="fa fa-circle-o"></i> <span>SMP/MTs</span></a>
				</li>
				<li class="{{ Request::is('sma*') ? 'active' : '' }}">
					<a href="{!! route('sma.index') !!}"><i class="fa fa-circle-o"></i> <span>SMA/MA</span></a>
				</li>
				<li class="{{ Request::is('paket*') ? 'active' : '' }}">
					<a href="{!! route('paket.index') !!}"><i class="fa fa-circle-o"></i> <span>Paket</span></a>
				</li>
				<li class="{{ Request::is('madrasah*') ? 'active' : '' }}">
					<a href="{!! route('madrasah.index') !!}"><i class="fa fa-circle-o"></i> <span>Madrasah</span></a>
				</li>
				<li class="{{ Request::is('pt*') ? 'active' : '' }}">
					<a href="{!! route('pt.index') !!}"><i class="fa fa-circle-o"></i> <span>PT</span></a>
				</li>
			</ul>
		</li>
		@php
		$menu_open =
		Request::is('masjid*') ||
		Request::is('mushola*') ||
		Request::is('majlis*');
		@endphp
		<li class="treeview {{ $menu_open ? 'menu-open active' : '' }}">
			<a href="#">
				<i class="fa fa-institution"></i>
				<span>Tempat Ibadah</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu" style="display: {{ $menu_open ? 'block' : 'none' }}">
				<li class="{{ Request::is('masjid*') ? 'active' : '' }}">
					<a href="{!! route('masjid.index') !!}"><i class="fa fa-circle-o"></i><span>Masjid Jami</span></a>
				</li>
				<li class="{{ Request::is('mushola*') ? 'active' : '' }}">
					<a href="{!! route('mushola.index') !!}"><i class="fa fa-circle-o"></i> <span>Mushola</span></a>
				</li>
				<li class="{{ Request::is('majlis*') ? 'active' : '' }}">
					<a href="{!! route('majlis.index') !!}"><i class="fa fa-circle-o"></i> <span>Majlis Ta'lim</span></a>
				</li>
			</ul>
		</li>
		@php
		$menu_open =
		Request::is('perpustakaan*');
		@endphp
		<li class="treeview {{ $menu_open ? 'menu-open active' : '' }}">
			<a href="#">
				<i class="fa fa-id-badge"></i>
				<span>Sarana Umum</span>
				<i class="fa fa-angle-left pull-right"></i>
			</a>
			<ul class="treeview-menu" style="display: {{ $menu_open ? 'block' : 'none' }}">
				<li class="{{ Request::is('perpustakaan*') ? 'active' : '' }}">
					<a href="{!! route('perpustakaan.index') !!}"><i class="fa fa-circle-o"></i><span>Perpustakaan</span></a>
				</li>
				<li>
					<a href="{!! route('datakosong.index') !!}"><i class="fa fa-circle-o"></i> <span>MCK</span></a>
				</li>
				<li>
					<a href="{!! route('datakosong.index') !!}"><i class="fa fa-circle-o"></i> <span>Pasar Desa</span></a>
				</li>
				<li>
					<a href="{!! route('datakosong.index') !!}"><i class="fa fa-circle-o"></i> <span>Embung Desa</span></a>
				</li>
			</ul>
		</li>
	</ul>
	{{-- BATAS SARANA & PRASARANA --}}
	<li>
		<a href="{!! route('daftarPemilihTetaps.index') !!}">
			<i class="fa fa-industry"></i> <span>Daftar Pemilih Tetap</span>
		</a>
	</li>
	<li>
		<a href="{!! route('datakosong.index') !!}">
			<i class="fa fa-users"></i> <span>Kemiskinan</span>
		</a>
	</li>
	<li>
		<a href="{!! route('pengangguran.index') !!}">
			<i class="fa fa-users"></i> <span>Pengangguran</span>
		</a>
	</li>
	<li class="{{ Request::is('customDatas*') ? 'active' : '' }}">
		<a href="{!! route('customDatas.index') !!}"><i class="fa fa-edit"></i><span>Data Lain-lain</span></a>
	</li>
<!--
<li>
    <a href="{!! route('datakosong.index') !!}">
      <i class="fa fa-map"></i> <span>Peta Desa</span>
    </a>
</li>-->
{{-- <li class="treeview">
    <a href="#">
        <i class="fa fa-users"></i>
        <span>User Management</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="disabled"><a href="statistikpendidikan"><i class="fa fa-circle-o"></i>Peraturan User</a></li>
        <li><a href="statistikpekerjaan"><i class="fa fa-circle-o"></i> Grup User</a></li>
    </ul>
</li> --}}
@section('css')
<style>
	.disabled {
		pointer-events:none;
		opacity:0.6;
	}
</style>
@endsection<li class="{{ Request::is('keteranganPenghasilans*') ? 'active' : '' }}">
    <a href="{!! route('keteranganPenghasilans.index') !!}"><i class="fa fa-edit"></i><span>Keterangan Penghasilans</span></a>
</li>

<li class="{{ Request::is('keteranganKelahirans*') ? 'active' : '' }}">
    <a href="{!! route('keteranganKelahirans.index') !!}"><i class="fa fa-edit"></i><span>Keterangan Kelahirans</span></a>
</li>

<li class="{{ Request::is('keteranganPenghasilans*') ? 'active' : '' }}">
    <a href="{!! route('keteranganPenghasilans.index') !!}"><i class="fa fa-edit"></i><span>Keterangan Penghasilans</span></a>
</li>

<li class="{{ Request::is('keteranganMenikahs*') ? 'active' : '' }}">
    <a href="{!! route('keteranganMenikahs.index') !!}"><i class="fa fa-edit"></i><span>Keterangan Menikahs</span></a>
</li>

<li class="{{ Request::is('keteranganUsahaBarus*') ? 'active' : '' }}">
    <a href="{!! route('keteranganUsahaBarus.index') !!}"><i class="fa fa-edit"></i><span>Keterangan Usaha Barus</span></a>
</li>

