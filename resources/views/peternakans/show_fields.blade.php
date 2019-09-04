<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $peternakan->id !!}</p>
</div>

<!-- Status Lahan Field -->
<div class="form-group">
    {!! Form::label('status_lahan', 'Status Lahan:') !!}
    <p>{!! $peternakan->status_lahan !!}</p>
</div>

<!-- Jenis Budidaya Field -->
<div class="form-group">
    {!! Form::label('jenis_budidaya', 'Jenis Budidaya:') !!}
    <p>{!! $peternakan->jenis_budidaya !!}</p>
</div>

<!-- Pengelola Field -->
<div class="form-group">
    {!! Form::label('pengelola', 'Pengelola:') !!}
    <p>{!! $peternakan->pengelola !!}</p>
</div>

<!-- Penanggung Jawab Field -->
<div class="form-group">
    {!! Form::label('penanggung_jawab', 'Penanggung Jawab:') !!}
    <p>{!! $peternakan->penanggung_jawab !!}</p>
</div>

<!-- Luas Area Field -->
<div class="form-group">
    {!! Form::label('luas_area', 'Luas Area:') !!}
    <p>{!! $peternakan->luas_area !!}</p>
</div>

<!-- jumlah ternak Field -->
<div class="form-group">
    {!! Form::label('jumlah_ternak', 'Jumlah Ternak :') !!}
    <p>{!! $peternakan->jumlah_ternak !!}</p>
</div>

<!-- Masa Pengelolaan Field -->
<div class="form-group">
    {!! Form::label('masa_pengelolaan', 'Masa Pengelolaan:') !!}
    <p>{!! $peternakan->masa_pengelolaan !!}</p>
</div>

<!-- Hasil perthaun Field -->
<div class="form-group">
    {!! Form::label('hasil_pertahun', 'Hasil Pertahun :') !!}
    <p>{!! $peternakan->hasil_pertahun !!}</p>
</div>

@include('leaflet.leaflet_1_3')
<!-- Batas zona Field -->
<div class="form-group">
    @include('leaflet.show_custom', [
        'input_name' => 'peternakan_koordinate', 
        'input_label' => 'Batas wilayah peternakan', 
        'input_data' => (isset($peternakan)) ? $peternakan->peternakan_koordinate[0] : Null,
    ])
</div>
@include('leaflet.show_custom_js')

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Dibuat pada:') !!}
    <p>{!! $peternakan->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Diperbarui pada:') !!}
    <p>{!! $peternakan->updated_at !!}</p>
</div>
