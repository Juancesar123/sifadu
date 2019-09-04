<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $perkebunan->id !!}</p>
</div>

<!-- Status Lahan Field -->
<div class="form-group">
    {!! Form::label('status_lahan', 'Status Lahan:') !!}
    <p>{!! $perkebunan->status_lahan !!}</p>
</div>

<!-- Jenis Budidaya Field -->
<div class="form-group">
    {!! Form::label('jenis_budidaya', 'Jenis Budidaya:') !!}
    <p>{!! $perkebunan->jenis_budidaya !!}</p>
</div>

<!-- Pengelola Field -->
<div class="form-group">
    {!! Form::label('pengelola', 'Pengelola:') !!}
    <p>{!! $perkebunan->pengelola !!}</p>
</div>

<!-- Penanggung Jawab Field -->
<div class="form-group">
    {!! Form::label('penanggung_jawab', 'Penanggung Jawab:') !!}
    <p>{!! $perkebunan->penanggung_jawab !!}</p>
</div>

<!-- Luas Area Field -->
<div class="form-group">
    {!! Form::label('luas_area', 'Luas Area:') !!}
    <p>{!! $perkebunan->luas_area !!}</p>
</div>

<!-- Masa Pengelolaan Field -->
<div class="form-group">
    {!! Form::label('masa_pengelolaan', 'Masa Pengelolaan:') !!}
    <p>{!! $perkebunan->masa_pengelolaan !!}</p>
</div>

<!-- hasil pertahun Field -->
<div class="form-group">
    {!! Form::label('hasil_pertahun', 'Hasil Pertahun:') !!}
    <p>{!! $perkebunan->hasil_pertahun !!}</p>
</div>

@include('leaflet.leaflet_1_3')
<!-- Batas zona Field -->
<div class="form-group">
    @include('leaflet.show_custom', [
        'input_name' => 'perkebunan_koordinate', 
        'input_label' => 'Batas wilayah perkebunan', 
        'input_data' => (isset($perkebunan)) ? $perkebunan->perkebunan_koordinate[0] : Null,
    ])
</div>
@include('leaflet.show_custom_js')

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $perkebunan->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $perkebunan->updated_at !!}</p>
</div>
