<!-- Nik Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nik', 'Nik:') !!}
    {!! Form::text('nik', null, ['class' => 'form-control']) !!}
</div>

<!-- No Kk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_kk', 'No Kk:') !!}
    {!! Form::text('no_kk', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Lengkap Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_lengkap', 'Nama Lengkap:') !!}
    {!! Form::text('nama_lengkap', null, ['class' => 'form-control']) !!}
</div>

<!-- Tempat Lahir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tempat_lahir', 'Tempat Lahir:') !!}
    {!! Form::text('tempat_lahir', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Lahir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_lahir', 'Tanggal Lahir:') !!}
    {!! Form::date('tanggal_lahir', isset($datapenduduk->tanggal_lahir) ? $datapenduduk->tanggal_lahir : null, ['class' => 'form-control']) !!}
</div>

<!-- Agama Field -->
<div class="form-group col-sm-6">
  <label>
    Agama
  </label>
  <select class="form-control" name="agama">
  @foreach ($agamas as $agama)
    <option value="{{strtoupper($agama->agama)}}">{{$agama->agama}}</option>
  @endforeach
</select>
</div>

<!-- Hub Kel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hub_kel', 'Hub Kel:') !!}
    {!! Form::select('hub_kel', ['ANAK' => 'anak', 'ISTRI' => 'istri', 'KEPALA KELUARGA' => 'kepala keluarga','CUCU' => 'cucu'], null, ['class' => 'form-control']) !!}
</div>

<!-- Status Kawin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_kawin', 'Status Kawin:') !!}
    {!! Form::select('status_kawin', ['KAWIN' => 'kawin', 'BELUM KAWIN' => 'belum kawin','CERAI HIDUP' => 'Cerai Hidup','CERAI MATI' => 'Cerai Mati'], null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Lengkap Ayah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_lengkap_ayah', 'Nama Lengkap Ayah:') !!}
    {!! Form::text('nama_lengkap_ayah', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Lengkap Ibu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_lengkap_ibu', 'Nama Lengkap Ibu:') !!}
    {!! Form::text('nama_lengkap_ibu', null, ['class' => 'form-control']) !!}
</div>

<!-- Alamat Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('alamat', 'Alamat:') !!}
    {!! Form::textarea('alamat', null, ['class' => 'form-control']) !!}
</div>

<!-- No Rt Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_rt', 'No Rt:') !!}
    {!! Form::text('no_rt', null, ['class' => 'form-control']) !!}
</div>

<!-- No Rw Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_rw', 'No Rw:') !!}
    {!! Form::text('no_rw', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Kecamatan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_kecamatan', 'Nama Kecamatan:') !!}
    {!! Form::text('nama_kecamatan', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Kecamatan 2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_kecamatan_2', 'Nama Kecamatan 2:') !!}
    {!! Form::text('nama_kecamatan_2', null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Pekerjaan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_pekerjaan', 'Jenis Pekerjaan:') !!}
    {!! Form::select('jenis_pekerjaan', [
        '1' => 'Belum/Tidak Bekerja',
        '3' => 'pelajar/mahasiswa',
        '2' => 'Mengurus Rumah tangga',
        '4' => 'Pensiunan',
        '9' => 'Petani/Pekebun',
        '10' => 'Peternak',
        '12' => 'Industri',
        '13' => 'Konstruksi',
        '15'=>'Karyawan Swasta',
        '65' => 'GURU',
        '88'=>'Wiraswasta',
        '19' => 'Buruh Harian Lepas',
        '84' => 'Pedagang',
        '5' => 'Pegawai Negri Sipil',
        '16' => 'Karyawan BUMN',
        '17' => 'Karyawan BUMD',
        '18' => 'Karyawan Honorer',
        '19' => 'Buruh Harian Lepas',
        '7' => 'Kepolisian RI',
        '8' => 'Perdagangan',
        '20' => 'Buruh Tani/Perkebunan',
        '21' => 'Buruh Nelayan / Perikanan',
        '22' => 'Buruh Peternakan',
        '23' => 'Pembantu Rumah Tangga',
        '34' => 'Penata Rambut',
        '36' => 'Seniman',
        '42' => 'Pendeta',
        '81' => 'Sopir',
        '14' => 'Transportasi',
        '4' => 'Pensinuan',
        '44' => 'Wartawan',
        '45' => 'Ustadz/Mubaligh',
        '6' => 'Tentara Nasional Indonesia',
        '64' => 'Dosen',
        '73' => 'Bidan',
        '74' => 'Perawat',
        '77' => 'Penyiar Televisi',
        '79' => 'Pelaut'
        ], null, ['class' => 'form-control']) !!}
</div>

<!-- Pendidikan Akhir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pendidikan_akhir', 'Pendidikan Akhir:') !!}
    {!! Form::select('pendidikan_akhir', [
        '4' => 'sltp/sederajat',
        '2' => 'Tidak Tamat SD/Sederajat',
        '3' => 'Tamat SD/Sederajat',
        '1' => 'Tidak / Belum Sekolah',
        '5' => 'SLTA/Sederajat',
        '6' => 'Diploma I / II',
        '7' => 'Akademi / Diploma III/ S.Muda',
        '8' => 'Diploma IV/Strata I',
        '9' => 'Strata II'
        ], null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
        {!! Form::label('jenis_kelamin', 'Jenis Kelamin:') !!}
        {!! Form::select('jenis_kelamin', [
            '1' => 'Laki-Laki',
            '2' => 'Perempuan',
            ], null, ['class' => 'form-control']) !!}
    </div>

<!-- Status Ktp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_KTP', 'Status Ktp:') !!}
    {!! Form::text('status_KTP', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('datapenduduks.index') !!}" class="btn btn-default">Batalkan</a>
</div>
