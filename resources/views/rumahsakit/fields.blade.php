<!-- daftar sarana Field -->
<div class="form-group col-sm-6">
    {!! Form::label('daftar_sarana', 'Daftar Sarana :') !!}
    {!! Form::text('daftar_sarana', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- penanggungjawab Field -->
<div class="form-group col-sm-6">
    {!! Form::label('penanggungjawab', 'Penanggungjawab :') !!}
    {!! Form::text('penanggungjawab', null, ['class' => 'form-control ' , 'required']) !!}
</div>

<!-- lokasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lokasi', 'Lokasi :') !!}
    {!! Form::text('lokasi', null, ['class' => 'form-control ' , 'required']) !!}
</div>

<!-- kondisi field -->
<div class="form-group col-sm-6">
    {!! Form::label('kondisi', 'Kondisi :') !!}
    {!! Form::text('kondisi', null, ['class' => 'form-control ' , 'required']) !!}
</div>

<!-- sdm field -->
<div class="form-group col-sm-6">
    {!! Form::label('sdm', 'Sumber Daya Manusia :') !!}
    {!! Form::text('sumber_daya_manusia', null, ['class' => 'form-control ' , 'required']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('rumahsakit.index') !!}" class="btn btn-default">Cancel</a>
</div>

@section('scripts')
<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
@endsection
