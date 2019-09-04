<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $majlis->id !!}</p>
</div>

<div class="form-group">
    {!! Form::label('daftar_sarana', 'Daftar Sarana :') !!}
    <p>{!! $majlis->daftar_sarana !!}</p>
</div>

<div class="form-group">
    {!! Form::label('penanggungjawab', 'Penanggung jawab :') !!}
    <p>{!! $majlis->penanggungjawab !!}</p>
</div>

<div class="form-group">
    {!! Form::label('lokasi', 'Lokasi :') !!}
    <p>{!! $majlis->lokasi !!}</p>
</div>

<div class="form-group">
    {!! Form::label('kondisi', 'Kondisi :') !!}
    <p>{!! $majlis->kondisi !!}</p>
</div>

<div class="form-group">
    {!! Form::label('sdm', 'Sumber Daya Manusia :') !!}
    <p>{!! $majlis->sumber_daya_manusia !!}</p>
</div>

<div class="form-group">
    {!! Form::label('created_at', 'Dibuat pada:') !!}
    <p>{!! $majlis->created_at !!}</p>
</div>

<div class="form-group">
    {!! Form::label('updated_at', 'Diperbarui pada:') !!}
    <p>{!! $majlis->updated_at !!}</p>
</div>
