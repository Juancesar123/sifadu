<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
	return \Auth::user() ? redirect('/home') : view('auth/login');
});

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
// $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// $this->post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('datapenduduks', 'datapendudukController');
Route::get('/uploadformdatapenduduk', 'datapendudukController@createupload');
Route::post('/prosesuploaddatapenduduk','datapendudukCOntroller@uploaddata');
Route::get('/cetakdukacapil/{id}','suratpengantarktpController@viewsuratdukacapil');
Route::get('/cetakkartukeluarga/{id}','suratpengantarkkController@viewsuratakartukeluarga');
Route::resource('pendudukmeninggals', 'pendudukmeninggalController');
Route::resource('penduduklahirs', 'penduduklahirController');

Route::resource('penyakitmenular', 'PenyakitMenularController');

Route::resource('bencanaalam', 'BencanaAlamController');

Route::resource('kemiskinan', 'KemiskinanController');

Route::resource('puskesmas', 'PuskesmasController');

Route::resource('bidan', 'BidanController');

Route::resource('tk', 'TKController');

Route::resource('paud', 'PAUDController');

Route::resource('datawarung', 'datawarungController');

Route::resource('datakosong', 'DataKosongController');

Route::resource('sd', 'SDMIController');

Route::resource('smp', 'SMPController');

Route::resource('sma', 'SMAController');

Route::resource('paket', 'PaketController');

Route::resource('masjid', 'MasjidController');

Route::resource('perpustakaan', 'PerpustakaanController');

Route::resource('majlis', 'MajlisController');

Route::resource('mushola', 'MusholaController');

Route::resource('pt', 'PTController');

Route::resource('madrasah', 'MadrasahController');

Route::resource('klinik', 'KlinikController');

Route::resource('rumahsakit', 'RumahSakitController');

Route::resource('posyandu', 'PosyanduController');

Route::resource('pendudukpindahs', 'pendudukpindahController')->middleware('auth');;

Route::resource('pengangguran', 'PengangguranController');

Route::get('kemiskinan/getnik', 'KemiskinanController@getnik');
Route::resource('kemiskinan', 'KemiskinanController');

Route::resource('rencanapembangunans', 'rencanapembangunanController');

Route::resource('kegiatanpembangunans', 'kegiatanpembangunanController');

Route::resource('inventarisproyeks', 'inventarisproyekController');

Route::resource('kaderpembangunans', 'kaderpembangunanController');

Route::resource('suratpengantarktps', 'suratpengantarktpController');

Route::resource('suratketerangantidakmampus', 'suratketerangantidakmampuController');

Route::resource('suratketerangandomisilis', 'suratketerangandomisiliController');

Route::resource('suratketeranganusahas', 'suratketeranganusahaController');

Route::resource('suratketeranganpenguasaantanahs', 'suratketeranganpenguasaantanahController');

Route::resource('suratketeranganlainnyas', 'suratketeranganlainnyaController');

Route::resource('suratketerangandesas', 'suratketerangandesaController');

Route::resource('keputusanbpds', 'keputusanbpdController');

Route::resource('anggotabpds', 'anggotabpdController');

Route::resource('kegiatanbpds', 'kegiatanbpdController');

Route::resource('agendabpds', 'agendabpdController');

Route::resource('dataekspedisis', 'dataekspedisiController');

Route::resource('datasuratmasuks', 'datasuratmasukController');

Route::resource('datasuratkeluars', 'datasuratkeluarController');
Route::get('statistikpendidikan','chartpendidikan@index');
Route::get('getstatistik','chartpendidikan@getdata');
Route::get('statistikpekerjaan','chartpekerjaan@index');
Route::get('statistikstatusperkawinan','chartstatusperkawinan@index');
Route::get('statistikagama','chartagama@index');

Route::resource('parameterjeniskelamins', 'parameterjeniskelaminController');

Route::resource('parameterstatuskawins', 'parameterstatuskawinController');

Route::resource('jenispekerjaans', 'jenispekerjaanController');

Route::resource('pendidikans', 'pendidikanController');

Route::resource('dusuns', 'dusunController');

Route::resource('agamas', 'agamaController');

Route::resource('pajaktanahs', 'pajaktanahController');
Route::get('uploadformdatapajak',function(){
	return view('pajaktanahs.formupload');
});
Route::post('prosesuploaddatapajak','pajaktanahcontroller@uploadfile');
Route::get('updatestatuspajak/{id}','pajaktanahcontroller@updatestatus');

Route::resource('potensiPertambangans', 'PotensiPertambanganController');

Route::resource('perkebunans', 'PerkebunanController');

Route::resource('peternakans', 'PeternakanController');

Route::resource('perikanans', 'PerikananController');

Route::resource('dataBudiDayaHutans', 'DataBudiDayaHutanController');

Route::resource('dataUkms', 'DataUkmController');

Route::resource('rutilahus', 'RutilahuController');

Route::resource('angkaPutusSekolahs', 'AngkaPutusSekolahController');

// Route::resource('angkaPutusSekolahs', 'AngkaPutusSekolahController')->name("pertanahan.blok", "index");

Route::resource('daftarPemilihTetaps', 'DaftarPemilihTetapController');

// Route Surat
Route::group(['prefix' => "letter/", "namespace" => "Letter"], function () {
    Route::group(['prefix' => "covering/", "namespace" => "Covering"], function () {
        Route::get("identity-card/{id}", "IdentityCardController@index")->name("letter.covering.identity_card");
        Route::get("family-card/{id}", "FamilyCardController@index")->name("letter.covering.family_card");
        Route::get("keterangan-kelahiran/{id}", "KeteranganKelahiranController@cetak")->name('letter.covering.keterangan-kelahiran');
        Route::get("keterangan-usaha-baru/{id}", "UsahaBaruController@cetak")->name('letter.covering.keterangan-usaha-baru');
        Route::get("keterangan-menikah/{id}", "SKMenikahController@cetak")->name('letter.covering.keterangan-menikah');
        Route::get("keterangan-penghasilan/{id}", "KeteranganPenghasilanController@cetak")->name('letter.covering.keterangan-penghasilan');
        Route::get("sktm/{id}", "SKTMController@cetak")->name("letter.covering.sktm");
        Route::get("domicile-letter/{id}", "DomicileLetterController@cetak")->name("letter.covering.domicile-letter");
        Route::get("descwork-letter/{id}", "DescWorkController@index")->name("letter.covering.descwork-letter");
        Route::get("authorityarea-letter/{id}", "AuthorityAreaController@cetak")->name("letter.covering.authorityarea-letter");
        Route::get("etc-letter/{id}", "EtcController@index")->name("letter.covering.etc-letter");
        Route::get("skck-letter/{id}", "SkckController@index")->name("letter.covering.skck-letter");
    });
});

    /**
     * Author:Dodi
     * Tampilan : Surat Pengantar Pindah
    */
Route::resource('suratpindah', 'suratpengantarpindahController');
Route::get('/cetaksuratpindah/{id}','suratpengantarpindahController@cetaksurat');
Route::get('/cetaksuratpindahantardesa/{id}','suratpengantarpindahController@cetaksuratantardesa');

/*
AUTHOR : @maswas
DATE : 21 April 2019
VIEW : was_pengantarkk
NOTE : Cetak blangko surat pengantar KK
*/
Route::get('/cetakkartukeluargaf16/{id}','suratpengantarkkController@suratkkf16');
Route::resource('suratpengantarkks', 'suratpengantarkkController');
Route::get('/cetakkartukeluarga/{id}/{jenis}','suratpengantarkkController@blankopengantar')->name('blankopengantar');
Route::get('/formpengantarkk/{jenis}','suratpengantarkkController@formpengantarkk')->name('formpengantarkk');

/**
 * Author: Yuarsa Tech
 * Desc: Pembuatan data statistik desa
 */
Route::get('statistik/agama', 'Statistik\AgamaController@index')->name('statistik.agama');
Route::get('statistik/perkawinan', 'Statistik\PerkawinanController@index')->name('statistik.perkawinan');
Route::get('statistik/pekerjaan', 'Statistik\PekerjaanController@index')->name('statistik.pekerjaan');
Route::get('statistik/pendidikan', 'Statistik\PendidikanController@index')->name('statistik.pendidikan');
Route::get('statistik/statistik', 'Statistik\StatistikController@index');
Route::put('home/desa/{id}', 'HomeController@update');

/**
 * Author: Yuarsa Tech
 * Desc: Pembuatan data administrasi umum desa
 */
Route::get('adums', 'Adum\DashboardController@index')->name('adum.dashboard');
Route::get('adum/agenda', 'Adum\BukuAgendaController@index')->name('adumagenda');
Route::get('adum/agenda/data', 'Adum\BukuAgendaController@datatables');
Route::get('adum/agenda/create', 'Adum\BukuAgendaController@create')->name('adumagenda.create');
Route::post('adum/agenda/create', 'Adum\BukuAgendaController@store')->name('adumagenda.store');
Route::get('adum/agenda/print-word', 'Adum\BukuAgendaController@printToWord')->name('adumagenda.printword');
Route::get('adum/agenda/print-pdf', 'Adum\BukuAgendaController@printToPdf')->name('adumagenda.printpdf');
Route::get('adum/agenda/{id}', 'Adum\BukuAgendaController@show')->name('adumagenda.show');
Route::get('adum/agenda/{id}/edit', 'Adum\BukuAgendaController@edit')->name('adumagenda.edit');
Route::patch('adum/agenda/{id}', 'Adum\BukuAgendaController@update')->name('adumagenda.update');
Route::delete('adum/agenda/{id}', 'Adum\BukuAgendaController@destroy')->name('adumagenda.delete');

Route::get('adum/lember', 'Adum\LembaranBeritaController@index')->name('lember');
Route::get('adum/lember/data', 'Adum\LembaranBeritaController@datatables');
Route::get('adum/lember/create', 'Adum\LembaranBeritaController@create')->name('lember.create');
Route::post('adum/lember/create', 'Adum\LembaranBeritaController@store')->name('lember.store');
Route::get('adum/lember/print-word', 'Adum\LembaranBeritaController@printToWord')->name('lember.printword');
Route::get('adum/lember/print-pdf', 'Adum\LembaranBeritaController@printToPdf')->name('lember.printpdf');
Route::get('adum/lember/{id}', 'Adum\LembaranBeritaController@show')->name('lember.show');
Route::get('adum/lember/{id}/edit', 'Adum\LembaranBeritaController@edit')->name('lember.edit');
Route::patch('adum/lember/{id}', 'Adum\LembaranBeritaController@update')->name('lember.update');
Route::delete('adum/lember/{id}', 'Adum\LembaranBeritaController@destroy')->name('lember.delete');

Route::get('adum/ekspedisi', 'Adum\EkspedisiController@index')->name('ekspedisi');
Route::get('adum/ekspedisi/data', 'Adum\EkspedisiController@datatables');
Route::get('adum/ekspedisi/create', 'Adum\EkspedisiController@create')->name('ekspedisi.create');
Route::post('adum/ekspedisi/create', 'Adum\EkspedisiController@store')->name('ekspedisi.store');
Route::get('adum/ekspedisi/print-word', 'Adum\EkspedisiController@printToWord')->name('ekspedisi.printword');
Route::get('adum/ekspedisi/print-pdf', 'Adum\EkspedisiController@printToPdf')->name('ekspedisi.printpdf');
Route::get('adum/ekspedisi/{id}', 'Adum\EkspedisiController@show')->name('ekspedisi.show');
Route::get('adum/ekspedisi/{id}/edit', 'Adum\EkspedisiController@edit')->name('ekspedisi.edit');
Route::patch('adum/ekspedisi/{id}', 'Adum\EkspedisiController@update')->name('ekspedisi.update');
Route::delete('adum/ekspedisi/{id}', 'Adum\EkspedisiController@destroy')->name('ekspedisi.delete');

Route::resource('markers', 'MarkerController');
Route::get('marker/data', 'MarkerController@anyData')->name('markers.data');
Route::get('marker/select/{dsa}', 'MarkerController@select')->name('markers.select');
Route::get('petadesa', 'MarkerController@indexgis');

Route::get('setting-app', 'AppController@index');
Route::post('center-map', 'AppController@updateCenter')->name('centermap');

Route::resource('msocials', 'MarkerSocialController');
Route::get('msocial/data', 'MarkerSocialController@anyData')->name('msocials.data');
Route::get('msocial/select/{dsa}', 'MarkerSocialController@select')->name('msocials.select');

Route::resource('mekonomis', 'MarkerEkonomiController');
Route::get('mekonomi/data', 'MarkerEkonomiController@anyData')->name('mekonomis.data');
Route::get('mekonomi/select/{dsa}', 'MarkerEkonomiController@select')->name('mekonomis.select');

Route::resource('minfrastrukturs', 'MarkerInfrastrukturController');
Route::get('minfrastruktur/data', 'MarkerInfrastrukturController@anyData')->name('minfrastrukturs.data');

Route::resource('customDatas', 'CustomDataController');
Route::get('customDatas/creates/{id}', 'CustomDataController@indexs');

Route::get('adum/keputusan', 'Adum\BukuKeputusanController@index')->name('adumkeputusan');
Route::get('adum/keputusan/data', 'Adum\BukuKeputusanController@datatables');
Route::get('adum/keputusan/create', 'Adum\BukuKeputusanController@create')->name('adumkeputusan.create');
Route::post('adum/keputusan/create', 'Adum\BukuKeputusanController@store')->name('adumkeputusan.store');
Route::get('adum/keputusan/{id}/edit', 'Adum\BukuKeputusanController@edit')->name('adumkeputusan.edit');
Route::patch('adum/keputusan/{id}', 'Adum\BukuKeputusanController@update')->name('adumkeputusan.update');
Route::delete('adum/keputusan/{id}', 'Adum\BukuKeputusanController@destroy')->name('adumkeputusan.delete');

Route::get('adum/peraturan', 'Adum\BukuPeraturanController@index')->name('adumperaturan');
Route::get('adum/peraturan/data', 'Adum\BukuPeraturanController@datatables');
Route::get('adum/peraturan/create', 'Adum\BukuPeraturanController@create')->name('adumperaturan.create');
Route::post('adum/peraturan/create', 'Adum\BukuPeraturanController@store')->name('adumperaturan.store');
Route::get('adum/peraturan/{id}/edit', 'Adum\BukuPeraturanController@edit')->name('adumperaturan.edit');
Route::patch('adum/peraturan/{id}', 'Adum\BukuPeraturanController@update')->name('adumperaturan.update');
Route::delete('adum/peraturan/{id}', 'Adum\BukuPeraturanController@destroy')->name('adumperaturan.delete');

Route::get('adum/inventaris', 'Adum\BukuInventarisController@index')->name('aduminventaris');
Route::get('adum/inventaris/data', 'Adum\BukuInventarisController@datatables');
Route::get('adum/inventaris/create', 'Adum\BukuInventarisController@create')->name('aduminventaris.create');
Route::post('adum/inventaris/create', 'Adum\BukuInventarisController@store')->name('aduminventaris.store');
Route::get('adum/inventaris/{id}/edit', 'Adum\BukuInventarisController@edit')->name('aduminventaris.edit');
Route::patch('adum/inventaris/{id}', 'Adum\BukuInventarisController@update')->name('aduminventaris.update');
Route::delete('adum/inventaris/{id}', 'Adum\BukuInventarisController@destroy')->name('aduminventaris.delete');

Route::get('adum/aparat', 'Adum\BukuAparatController@index')->name('adumaparat');
Route::get('adum/aparat/data', 'Adum\BukuAparatController@datatables');
Route::get('adum/aparat/create', 'Adum\BukuAparatController@create')->name('adumaparat.create');
Route::post('adum/aparat/create', 'Adum\BukuAparatController@store')->name('adumaparat.store');
Route::get('adum/aparat/{id}/edit', 'Adum\BukuAparatController@edit')->name('adumaparat.edit');
Route::patch('adum/aparat/{id}', 'Adum\BukuAparatController@update')->name('adumaparat.update');
Route::delete('adum/aparat/{id}', 'Adum\BukuAparatController@destroy')->name('adumaparat.delete');


/*
AUTHOR : @masaji
DATE : 10 juni 2019
VIEW : formpengajuankks
NOTE : Cetak form pengajuan KK
*/
Route::resource('formpengajuankk', 'FormPengajuanKKController');
Route::get('/cetakformpengajuankk/{id}/{jenis}','FormPengajuanKKController@blankopengajuan')->name('blankopengajuan');
Route::get('/formpengajuankk/{jenis}','FormPengajuanKKController@formpengajuankk')->name('formpengajuankks');


/*
AUTHOR : @masaji
DATE : 13 juni 2019
VIEW : detailkks
NOTE : Detail KK
*/
Route::resource('detailkk', 'DetailKKController');
Route::get('cari/datapenduduk', ['as' => 'cari.datapenduduk', 'uses' =>'DetailKKController@cariDataPenduduk']);
/*
AUTHOR : @masaji
DATE : 13 juni 2019
VIEW :suratketeranganskcks
NOTE : SKCK
*/
Route::resource('suratketeranganskcks', 'suratketeranganskckController');
Route::get('suratketeranganskcks/{id}/print',['as' => 'suratketeranganskcks.print', 'uses' => 'suratketeranganskckController@printSKCK']);

Route::resource('keterangan-kelahiran', 'KeteranganKelahiranController');
Route::resource('keteranganPenghasilans', 'KeteranganPenghasilanController');
Route::resource('keteranganMenikahs', 'KeteranganMenikahController');
Route::resource('keteranganUsahaBarus', 'KeteranganUsahaBaruController');

/*
AUTHOR : @masaji
DATE : 23 juni 2019
VIEW :setting
NOTE : setting
*/
Route::resource('setting', 'SettingController');

/*
AUTHOR : @azophy
DATE : 24 juni 2019
VIEW :customDatas
NOTE : custom data GIS
*/
Route::resource('customDatas', 'CustomDataController');

Route::resource('parameterIndikatorKemiskinans', 'ParameterIndikatorKemiskinanController');

Route::resource('kemiskinan', 'PendudukMiskinController');