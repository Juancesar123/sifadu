<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $posyandu->id !!}</p>
</div>

<div class="form-group">
    {!! Form::label('daftar_sarana', 'Daftar Sarana :') !!}
    <p>{!! $posyandu->daftar_sarana !!}</p>
</div>

<div class="form-group">
    {!! Form::label('penanggungjawab', 'Penanggung jawab :') !!}
    <p>{!! $posyandu->penanggungjawab !!}</p>
</div>

<div class="form-group">
    {!! Form::label('lokasi', 'Lokasi :') !!}
    <p>{!! $posyandu->lokasi !!}</p>
</div>

<div class="form-group">
    {!! Form::label('kondisi', 'Kondisi :') !!}
    <p>{!! $posyandu->kondisi !!}</p>
</div>

<div class="form-group">
    {!! Form::label('sdm', 'Sumber Daya Manusia :') !!}
    <p>{!! $posyandu->sumber_daya_manusia !!}</p>
</div>

<div class="form-group">
    {!! Form::label('created_at', 'Dibuat pada:') !!}
    <p>{!! $posyandu->created_at !!}</p>
</div>

<div class="form-group">
    {!! Form::label('updated_at', 'Diperbarui pada:') !!}
    <p>{!! $posyandu->updated_at !!}</p>
</div>
