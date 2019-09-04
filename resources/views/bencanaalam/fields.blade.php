@include('leaflet.leaflet_1_3')
@include('leaflet.leaflet_draw')

<!-- Jenis bencana Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_bencana', 'Jenis Bencana :') !!}
    {!! Form::text('jenis_bencana', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- lokasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lokasi', 'Lokasi :') !!}
    {!! Form::text('lokasi', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status :') !!}
    {!! Form::text('status', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- korban jiwa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('korban_jiwa', 'Korban Jiwa :') !!}
    {!! Form::number('korban_jiwa', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- korban luka Field -->
<div class="form-group col-sm-6">
    {!! Form::label('korban_luka', 'Korban Luka :') !!}
    {!! Form::number('korban_luka', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- kerusakan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kerusakan', 'Kerusakan :') !!}
    {!! Form::text('kerusakan', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- nilai kerusakan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nilai_kerusakan', 'Nilai Kerusakan :') !!}
    {!! Form::text('nilai_kerusakan', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group col-sm-12">
    @include('leaflet.input_custom', [
        'input_name' => 'koordinate', 
        'input_label' => 'Batas area terdampak bencana', 
        'input_data' => (isset($bencanaalam)) ? $bencanaalam->koordinate[0] : Null,
        'button_new_point_display' => false,
    ])
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['id' => 'button_submit', 'class' => 'btn btn-primary']) !!}
    <a href="{!! route('datawarung.index') !!}" class="btn btn-default">Cancel</a>
</div>

@include('leaflet.input_custom_js')
