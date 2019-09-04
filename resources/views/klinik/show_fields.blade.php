<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $klinik->id !!}</p>
</div>

<div class="form-group">
    {!! Form::label('daftar_sarana', 'Daftar Sarana :') !!}
    <p>{!! $klinik->daftar_sarana !!}</p>
</div>

<div class="form-group">
    {!! Form::label('penanggungjawab', 'Penanggung jawab :') !!}
    <p>{!! $klinik->penanggungjawab !!}</p>
</div>

<div class="form-group">
    {!! Form::label('lokasi', 'Lokasi :') !!}
    <p>{!! $klinik->lokasi !!}</p>
</div>

<div class="form-group">
    {!! Form::label('kondisi', 'Kondisi :') !!}
    <p>{!! $klinik->kondisi !!}</p>
</div>

<div class="form-group">
    {!! Form::label('sdm', 'Sumber Daya Manusia :') !!}
    <p>{!! $klinik->sumber_daya_manusia !!}</p>
</div>

<div class="form-group">
    {!! Form::label('created_at', 'Dibuat pada:') !!}
    <p>{!! $klinik->created_at !!}</p>
</div>

<div class="form-group">
    {!! Form::label('updated_at', 'Diperbarui pada:') !!}
    <p>{!! $klinik->updated_at !!}</p>
</div>
