<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $pendidikan->id !!}</p>
</div>

<!-- Pendidikan Field -->
<div class="form-group">
    {!! Form::label('pendidikan', 'Pendidikan:') !!}
    <p>{!! $pendidikan->pendidikan !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Dibuat pada:') !!}
    <p>{!! $pendidikan->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Diperbarui pada:') !!}
    <p>{!! $pendidikan->updated_at !!}</p>
</div>

