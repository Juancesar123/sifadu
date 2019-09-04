@include('leaflet.leaflet_1_3')
@include('leaflet.leaflet_draw')

<!-- Statuslahan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('statusLahan', 'Status Lahan:') !!}
    {!! Form::select('statusLahan', ['C / girik' => 'C / girik', 'AJB' => 'AJB', 'SHM' => 'SHM', 'HGU' => 'HGU'], null, ['class' => 'form-control', 'placeholder' => '--- status lahan ---', 'required']); !!}
</div>

<!-- Jenispertambangan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenisPertambangan', 'Jenis Pertambangan:') !!}
    {!! Form::text('jenisPertambangan', null, ['class' => 'form-control', 'placeholder' => 'Contoh : batu bara, emas, dll', 'required']) !!}
</div>

<!-- Pengelola Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pengelola', 'Pengelola:') !!}
    {!! Form::text('pengelola', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Penanggungjawab Field -->
<div class="form-group col-sm-6">
    {!! Form::label('penanggungJawab', 'Penanggung Jawab:') !!}
    {!! Form::text('penanggungJawab', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Luasarea Field -->
<div class="form-group col-sm-6">
    {!! Form::label('luasArea', 'Luas Area:') !!}
    {!! Form::text('luasArea', null, ['class' => 'form-control', 'placeholder' => 'masukkan beserta satuan. contoh : 200 m2, 10 ha, dll', 'required']) !!}
</div>

<!-- Masapengelolaan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('masaPengelolaan', 'Masa Pengelolaan:') !!}
    {!! Form::text('masaPengelolaan', null, ['class' => 'form-control', 'placeholder' => 'masukkan pertahun. contoh : 10 tahun, 15 tahun', 'required']) !!}
</div>

<!-- Nilali investasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nilaiInvestasi', 'Nilai Investasi:') !!}
    {!! Form::number('nilaiInvestasi',null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- lokasiTambang Field -->
<div class="formzgroup col-sm-6">
    {!! Form::label('lokasiTambang', 'Lokasi Tambang :') !!}
    {!! Form::text('lokasiTambang', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group col-sm-12">
    @include('leaflet.input_custom', [
        'input_name' => 'koordinate', 
        'input_label' => 'Batas wilayah pertambangan', 
        'input_data' => (isset($potensiPertambangan)) ? $potensiPertambangan->koordinate[0] : Null,
        'button_new_point_display' => false,
    ])
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['id' => 'button_submit', 'class' => 'btn btn-primary']) !!}
    <a href="{!! route('potensiPertambangans.index') !!}" class="btn btn-default">Batalkan</a>
</div>

@include('leaflet.input_custom_js')
