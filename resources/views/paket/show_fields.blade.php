<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $paket->id !!}</p>
</div>

<div class="form-group">
    {!! Form::label('daftar_sarana', 'Daftar Sarana :') !!}
    <p>{!! $paket->daftar_sarana !!}</p>
</div>

<div class="form-group">
    {!! Form::label('penanggungjawab', 'Penanggung jawab :') !!}
    <p>{!! $paket->penanggungjawab !!}</p>
</div>

<div class="form-group">
    {!! Form::label('lokasi', 'Lokasi :') !!}
    <p>{!! $paket->lokasi !!}</p>
</div>

<div class="form-group">
    {!! Form::label('kondisi', 'Kondisi :') !!}
    <p>{!! $paket->kondisi !!}</p>
</div>

<div class="form-group">
    {!! Form::label('sdm', 'Sumber Daya Manusia :') !!}
    <p>{!! $paket->sumber_daya_manusia !!}</p>
</div>

<div class="form-group">
    {!! Form::label('created_at', 'Dibuat pada:') !!}
    <p>{!! $paket->created_at !!}</p>
</div>

<div class="form-group">
    {!! Form::label('updated_at', 'Diperbarui pada:') !!}
    <p>{!! $paket->updated_at !!}</p>
</div>
