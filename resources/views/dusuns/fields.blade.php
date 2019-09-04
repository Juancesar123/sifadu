@include('leaflet.leaflet_1_3')
@include('leaflet.leaflet_draw')

<!-- Nama Dusun Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_dusun', 'Nama Dusun:') !!}
    {!! Form::text('nama_dusun', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    @include('leaflet.input_custom', [
        'input_name' => 'dusun_koordinate', 
        'input_label' => 'Batas wilayah dusun', 
        'input_data' => (isset($dusun)) ? $dusun->dusun_koordinate[0] : Null,
        'button_new_point_display' => false,
    ])
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['id' => 'button_submit', 'class' => 'btn btn-primary']) !!}
    <a href="{!! route('dusuns.index') !!}" class="btn btn-default">Cancel</a>
</div>

@include('leaflet.input_custom_js')
