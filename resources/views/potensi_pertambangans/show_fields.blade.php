<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $potensiPertambangan->id !!}</p>
</div>

<!-- Statuslahan Field -->
<div class="form-group">
    {!! Form::label('statusLahan', 'status Lahan :') !!}
    <p>{!! $potensiPertambangan->statusLahan !!}</p>
</div>

<!-- Jenispertambangan Field -->
<div class="form-group">
    {!! Form::label('jenisPertambangan', 'Jenis Pertambangan :') !!}
    <p>{!! $potensiPertambangan->jenisPertambangan !!}</p>
</div>

<!-- Pengelola Field -->
<div class="form-group">
    {!! Form::label('pengelola', 'Pengelola :') !!}
    <p>{!! $potensiPertambangan->pengelola !!}</p>
</div>

<!-- Penanggungjawab Field -->
<div class="form-group">
    {!! Form::label('penanggungJawab', 'Penanggung jawab :') !!}
    <p>{!! $potensiPertambangan->penanggungJawab !!}</p>
</div>

<!-- Luasarea Field -->
<div class="form-group">
    {!! Form::label('luasArea', 'Luas Area :') !!}
    <p>{!! $potensiPertambangan->luasArea !!}</p>
</div>

<!-- Masapengelolaan Field -->
<div class="form-group">
    {!! Form::label('masaPengelolaan', 'Masa Pengelolaan :') !!}
    <p>{!! $potensiPertambangan->masaPengelolaan !!}</p>
</div>

<!-- nilaiInvestasi Field -->
<div class="form-group">
    {!! Form::label('nilaiInvestasi', 'Nilai Investasi :') !!}
    <p>{!! $potensiPertambangan->nilaiInvestasi !!}</p>
</div>

<!-- lokasiTambang Field -->
<div class="form-group">
    {!! Form::label('lokasiTambang', 'Lokasi Tambang :') !!}
    <p>{!! $potensiPertambangan->lokasiTambang !!}</p>
</div>

@include('leaflet.leaflet_1_3')
<!-- Batas zona Field -->
<div class="form-group">
    @include('leaflet.show_custom', [
        'input_name' => 'koordinate', 
        'input_label' => 'Batas wilayah pertambangan', 
        'input_data' => (isset($potensiPertambangan)) ? $potensiPertambangan->koordinate[0] : Null,
    ])
</div>
@include('leaflet.show_custom_js')

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Dibuat pada:') !!}
    <p>{!! $potensiPertambangan->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Diperbarui pada:') !!}
    <p>{!! $potensiPertambangan->updated_at !!}</p>
</div>
