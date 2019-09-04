<div class="form-group col-sm-6">
    {!! Form::label('fileexcel', 'Upload Data excel Penduduk:') !!}
    {!! Form::file('fileexcel', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pajaktanahs.index') !!}" class="btn btn-default">Cancel</a>
</div>
