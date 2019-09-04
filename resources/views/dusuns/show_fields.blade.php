<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $dusun->id !!}</p>
</div>

<!-- Nama Dusun Field -->
<div class="form-group">
    {!! Form::label('nama_dusun', 'Nama Dusun:') !!}
    <p>{!! $dusun->nama_dusun !!}</p>
</div>

@include('leaflet.leaflet_1_3')
<!-- Batas zona Field -->
<div class="form-group">
    @include('leaflet.show_custom', [
        'input_name' => 'dusun_koordinate', 
        'input_label' => 'Batas wilayah dusun', 
        'input_data' => (isset($dusun)) ? $dusun->dusun_koordinate[0] : Null,
    ])
</div>
@include('leaflet.show_custom_js')

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Dibuat pada:') !!}
    <p>{!! $dusun->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Diperbarui pada:') !!}
    <p>{!! $dusun->updated_at !!}</p>
</div>

