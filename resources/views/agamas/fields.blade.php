<!-- Agama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('agama', 'Agama:') !!}
    {!! Form::text('agama', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('agamas.index') !!}" class="btn btn-default">Batalkan</a>
</div>
