<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $penduduklahir->id !!}</p>
</div>

<!-- Penduduk Id Field -->
<div class="form-group">
    {!! Form::label('no_kk', 'No KK :') !!}
    <p>{!! $penduduklahir->no_kk !!}</p>
</div>

<!-- Tanggal Meninggal Field -->
<div class="form-group">
    {!! Form::label('nama_ibu', 'Nama Ibu :') !!}
    <p>{!! $penduduklahir->nama_ibu !!}</p>
</div>

<!-- Keterangan Meninggal Field -->
<div class="form-group">
    {!! Form::label('nama_bayi', 'Nama Bayi :') !!}
    <p>{!! $penduduklahir->nama_bayi !!}</p>
</div>

{{-- tanggal lahir field --}}
<div class="form-group">
    {!! Form::label('tgl_lahir', 'Tanggal Lahir :') !!}
    <p>{!! $penduduklahir->tgl_lahir !!}</p>
</div>

{{-- waktu lahir field --}}
<div class="form-group">
    {!! Form::label('waktu_lahir', 'Waktu Lahir :') !!}
    <p>{!! $penduduklahir->waktu_lahir !!}</p>
</div>

{{-- tempat lahir field --}}
<div class="form-group">
    {!! Form::label('tempat_lahir', 'Tempat Lahir :') !!}
    <p>{!! $penduduklahir->tempat_lahir !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Dibuat pada:') !!}
    <p>{!! $penduduklahir->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Diperbarui pada:') !!}
    <p>{!! $penduduklahir->updated_at !!}</p>
</div>
