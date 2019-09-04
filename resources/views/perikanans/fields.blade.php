@include('leaflet.leaflet_1_3')
@include('leaflet.leaflet_draw')

<!-- Status Lahan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_lahan', 'Status Lahan:') !!}
    {!! Form::select('status_lahan', ['C / girik' => 'C / girik', 'AJB' => 'AJB', 'SHM' => 'SHM', 'HGU' => 'HGU'], null, ['class' => 'form-control', 'placeholder' => '--- status lahan ---', 'required']); !!}
</div>

<!-- Jenis Budidaya Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_budidaya', 'Jenis Budidaya:') !!}
    {!! Form::text('jenis_budidaya', null, ['class' => 'form-control']) !!}
</div>

<!-- Pengelola Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pengelola', 'Pengelola:') !!}
    {!! Form::text('pengelola', null, ['class' => 'form-control']) !!}
</div>

<!-- Penanggung Jawab Field -->
<div class="form-group col-sm-6">
    {!! Form::label('penanggung_jawab', 'Penanggung Jawab:') !!}
    {!! Form::text('penanggung_jawab', null, ['class' => 'form-control']) !!}
</div>

<!-- Luas Area Field -->
<div class="form-group col-sm-6">
    {!! Form::label('luas_area', 'Luas Area:') !!}
    {!! Form::text('luas_area', null, ['class' => 'form-control']) !!}
</div>

<!-- Masa Pengelolaan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('masa_pengelolaan', 'Masa Pengelolaan:') !!}
    {!! Form::text('masa_pengelolaan', null, ['class' => 'form-control']) !!}
</div>

<!-- hasil pertahun Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hasil_pertahun', 'Hasil Pertahun :') !!}
    {!! Form::text('hasil_pertahun', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group col-sm-12">
    @include('leaflet.input_custom', [
        'input_name' => 'perikanan_koordinate', 
        'input_label' => 'Batas wilayah perikanan', 
        'input_data' => (isset($perikanan)) ? $perikanan->perikanan_koordinate[0] : Null,
        'button_new_point_display' => false,
    ])
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['id' => 'button_submit', 'class' => 'btn btn-primary']) !!}
    <a href="{!! route('perikanans.index') !!}" class="btn btn-default">Cancel</a>
</div>

@include('leaflet.input_custom_js')
