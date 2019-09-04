<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $pengangguran->id !!}</p>
</div>

<!-- nik Field -->
<div class="form-group">
    {!! Form::label('nik', 'NIK :') !!}
    <p>{!! $pengangguran->nik !!}</p>
</div>

<!-- nama Field -->
<div class="form-group">
    {!! Form::label('nama', 'Nama :') !!}
    <p>{!! $pengangguran->nama !!}</p>
</div>

<!-- Alamat Field -->
<div class="form-group">
    {!! Form::label('alamat', 'Alamat :') !!}
    <p>{!! $pengangguran->alamat !!}</p>
</div>

{{-- jenis pengangguran field --}}
<div class="form-group">
    {!! Form::label('jenis_pengangguran', 'Jenis Pengangguran :') !!}
    <p>{!! $pengangguran->jenis_pengangguran !!}</p>
</div>

{{-- usaha sampingan field --}}
<div class="form-group">
    {!! Form::label('usaha', 'Usaha Sampingan :') !!}
    <p>{!! $pengangguran->usaha !!}</p>
</div>

{{-- pengalaman field --}}
<div class="form-group">
    {!! Form::label('pengalaman', 'Pengalaman :') !!}
    <p>{!! $pengangguran->pengalaman !!}</p>
</div>

{{-- keterampilan field --}}
<div class="form-group">
    {!! Form::label('keterampilan', 'Keterampilan :') !!}
    <p>{!! $pengangguran->keterampilan !!}</p>
</div>

{{-- pendidikan terakhir field --}}
<div class="form-group">
    {!! Form::label('pendidikan', 'Pendidikan Terakhir :') !!}
    <p>{!! $pengangguran->pendidikan !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $pengangguran->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $pengangguran->updated_at !!}</p>
</div>
