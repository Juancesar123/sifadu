<!-- Id Penduduk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_penduduk', 'Id Penduduk:') !!}
    {!! Form::number('id_penduduk', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Indikator Kemiskinan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_indikator_kemiskinan', 'Id Indikator Kemiskinan:') !!}
    {!! Form::number('id_indikator_kemiskinan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('kemiskinan.index') !!}" class="btn btn-default">Cancel</a>
</div>