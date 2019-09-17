<!-- Indikator Kemiskinan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('indikator_kemiskinan', 'Indikator Kemiskinan:') !!}
    {!! Form::textarea('indikator_kemiskinan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('parameterIndikatorKemiskinans.index') !!}" class="btn btn-default">Cancel</a>
</div>
