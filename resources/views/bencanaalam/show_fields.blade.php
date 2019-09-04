<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $bencanaalam->id !!}</p>
</div>

<!-- jenis bencana Field -->
<div class="form-group">
    {!! Form::label('jenis_bencana', 'Jenis Bencana :') !!}
    <p>{!! $bencanaalam->jenis_bencana !!}</p>
</div>

<!-- lokasi Field -->
<div class="form-group">
    {!! Form::label('lokasi', 'Lokasi :') !!}
    <p>{!! $bencanaalam->lokasi !!}</p>
</div>

<!-- status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status :') !!}
    <p>{!! $bencanaalam->status !!}</p>
</div>

<!-- korban jiwa Field -->
<div class="form-group">
    {!! Form::label('korban_jiwa', 'Korban Jiwa :') !!}
    <p>{!! $bencanaalam->korban_jiwa !!}</p>
</div>

<!-- korban luka Field -->
<div class="form-group">
    {!! Form::label('korban_luka', 'Korban Luka :') !!}
    <p>{!! $bencanaalam->korban_luka !!}</p>
</div>

<!-- kerusakan Field -->
<div class="form-group">
    {!! Form::label('kerusakan', 'Kerusakan :') !!}
    <p>{!! $bencanaalam->kerusakan !!}</p>
</div>

<!-- nilai kerusakan Field -->
<div class="form-group">
    {!! Form::label('nilai_kerusakan', 'Nilai Kerusakan :') !!}
    <p>{!! $bencanaalam->nilai_kerusakan !!}</p>
</div>

@include('leaflet.leaflet_1_3')
<!-- Batas zona Field -->
<div class="form-group">
    @include('leaflet.show_custom', [
        'input_name' => 'koordinate', 
        'input_label' => 'Batas area terdampak bencana', 
        'input_data' => (isset($bencanaalam)) ? $bencanaalam->koordinate[0] : Null,
    ])
</div>
@include('leaflet.show_custom_js')

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Dibuat pada:') !!}
    <p>{!! $bencanaalam->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Diperbarui pada:') !!}
    <p>{!! $bencanaalam->updated_at !!}</p>
</div>
