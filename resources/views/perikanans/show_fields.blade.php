<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $perikanan->id !!}</p>
</div>

<!-- Status Lahan Field -->
<div class="form-group">
    {!! Form::label('status_lahan', 'Status Lahan:') !!}
    <p>{!! $perikanan->status_lahan !!}</p>
</div>

<!-- Jenis Budidaya Field -->
<div class="form-group">
    {!! Form::label('jenis_budidaya', 'Jenis Budidaya:') !!}
    <p>{!! $perikanan->jenis_budidaya !!}</p>
</div>

<!-- Pengelola Field -->
<div class="form-group">
    {!! Form::label('pengelola', 'Pengelola:') !!}
    <p>{!! $perikanan->pengelola !!}</p>
</div>

<!-- Penanggung Jawab Field -->
<div class="form-group">
    {!! Form::label('penanggung_jawab', 'Penanggung Jawab:') !!}
    <p>{!! $perikanan->penanggung_jawab !!}</p>
</div>

<!-- Luas Area Field -->
<div class="form-group">
    {!! Form::label('luas_area', 'Luas Area:') !!}
    <p>{!! $perikanan->luas_area !!}</p>
</div>

<!-- Masa Pengelolaan Field -->
<div class="form-group">
    {!! Form::label('masa_pengelolaan', 'Masa Pengelolaan:') !!}
    <p>{!! $perikanan->masa_pengelolaan !!}</p>
</div>

<!-- hasil pertahun Field -->
<div class="form-group">
    {!! Form::label('hasil_pertahun', 'Hasil Pertahun:') !!}
    <p>{!! $perikanan->hasil_pertahun !!}</p>
</div>

@include('leaflet.leaflet_1_3')
<!-- Batas zona Field -->
<div class="form-group">
    @include('leaflet.show_custom', [
        'input_name' => 'perikanan_koordinate', 
        'input_label' => 'Batas wilayah perikanan', 
        'input_data' => (isset($perikanan)) ? $perikanan->perikanan_koordinate[0] : Null,
    ])
</div>
@include('leaflet.show_custom_js')

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $perikanan->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $perikanan->updated_at !!}</p>
</div>
