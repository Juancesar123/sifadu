<!-- Pendidikan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pendidikan', 'Pendidikan:') !!}
    {!! Form::text('pendidikan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pendidikans.index') !!}" class="btn btn-default">Batalkan</a>
</div>
