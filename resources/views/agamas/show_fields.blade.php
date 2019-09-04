<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $agama->id !!}</p>
</div>

<!-- Agama Field -->
<div class="form-group">
    {!! Form::label('agama', 'Agama:') !!}
    <p>{!! $agama->agama !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Dibuat pada:') !!}
    <p>{!! $agama->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Diperbarui pada:') !!}
    <p>{!! $agama->updated_at !!}</p>
</div>

