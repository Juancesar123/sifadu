<div class="form-group col-sm-6">
    {!! Form::label('fileexcel', 'Upload Data excel Penduduk:') !!}
    {!! Form::file('fileexcel', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('datapenduduks.index') !!}" class="btn btn-default">Batalkan</a>
</div>
