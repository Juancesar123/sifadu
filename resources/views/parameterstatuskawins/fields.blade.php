<!-- Status Nikah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_nikah', 'Status Nikah:') !!}
    {!! Form::text('status_nikah', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('parameterstatuskawins.index') !!}" class="btn btn-default">Batalkan</a>
</div>
