<!-- No KKl Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_kk', 'No KK :') !!}
    {!! Form::number('no_kk', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- nama kepala kk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_kepala_kk', 'Nama Kepala KK :') !!}
    {!! Form::text('nama_kepala_kk', null, ['class' => 'form-control ' , 'required']) !!}
</div>

<!-- Nama penderita Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_penderita', 'Nama Penderita :') !!}
    {!! Form::text('nama_penderita', null, ['class' => 'form-control ' , 'required']) !!}
</div>

<!-- usia field -->
<div class="form-group col-sm-6">
    {!! Form::label('usia', 'Usia :') !!}
    {!! Form::number('usia', null, ['class' => 'form-control ' , 'required']) !!}
</div>

<!-- diagnosa field -->
<div class="form-group col-sm-6">
    {!! Form::label('diagnosa', 'Diagnosa :') !!}
    {!! Form::text('diagnosa', null, ['class' => 'form-control ' , 'required']) !!}
</div>

<!-- rujukan field -->
<div class="form-group col-sm-6">
    {!! Form::label('rujukan', 'Rujukan :') !!}
    {!! Form::text('rujukan', null, ['class' => 'form-control ' , 'required']) !!}
</div>

<!-- jaminan kesehatan field -->
<div class="form-group col-sm-6">
    {!! Form::label('jaminan_kesehatan', 'Jaminan Kesehatan :') !!}
    {!! Form::text('jaminan_kesehatan', null, ['class' => 'form-control ' , 'required']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('penyakitmenular.index') !!}" class="btn btn-default">Cancel</a>
</div>

@section('scripts')
<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
@endsection
