<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $dataBudiDayaHutan->id !!}</p>
</div>

<!-- Status Lahan Field -->
<div class="form-group">
    {!! Form::label('status_lahan', 'Status Lahan:') !!}
    <p>{!! $dataBudiDayaHutan->status_lahan !!}</p>
</div>

<!-- Jenis Budidaya Field -->
<div class="form-group">
    {!! Form::label('jenis_budidaya', 'Jenis Budidaya:') !!}
    <p>{!! $dataBudiDayaHutan->jenis_budidaya !!}</p>
</div>

<!-- Pengelola Field -->
<div class="form-group">
    {!! Form::label('pengelola', 'Pengelola:') !!}
    <p>{!! $dataBudiDayaHutan->pengelola !!}</p>
</div>

<!-- Penanggung Jawab Field -->
<div class="form-group">
    {!! Form::label('penanggung_jawab', 'Penanggung Jawab:') !!}
    <p>{!! $dataBudiDayaHutan->penanggung_jawab !!}</p>
</div>

<!-- Luas Area Field -->
<div class="form-group">
    {!! Form::label('luas_area', 'Luas Area:') !!}
    <p>{!! $dataBudiDayaHutan->luas_area !!}</p>
</div>

<!-- Masa Pengelolaan Field -->
<div class="form-group">
    {!! Form::label('masa_pengelolaan', 'Masa Pengelolaan:') !!}
    <p>{!! $dataBudiDayaHutan->masa_pengelolaan !!}</p>
</div>

@include('leaflet.leaflet_1_3')
<!-- Batas zona Field -->
<div class="form-group">
    @include('leaflet.show_custom', [
        'input_name' => 'koordinate', 
        'input_label' => 'Batas wilayah Budi Daya Hutan', 
        'input_data' => (isset($dataBudiDayaHutan)) ? $dataBudiDayaHutan->koordinate[0] : Null,
    ])
</div>
@include('leaflet.show_custom_js')

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Dibuat pada:') !!}
    <p>{!! $dataBudiDayaHutan->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Diperbarui pada:') !!}
    <p>{!! $dataBudiDayaHutan->updated_at !!}</p>
</div>

