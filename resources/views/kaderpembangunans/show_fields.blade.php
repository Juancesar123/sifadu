<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $kaderpembangunan->id !!}</p>
</div>

<!-- Nama Field -->
<div class="form-group">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{!! $kaderpembangunan->nama !!}</p>
</div>

<!-- Umur Field -->
<div class="form-group">
    {!! Form::label('umur', 'Umur:') !!}
    <p>{!! $kaderpembangunan->umur !!}</p>
</div>

<!-- Jeniskelamin Field -->
<div class="form-group">
    {!! Form::label('jeniskelamin', 'Jeniskelamin:') !!}
    @if($kaderpembangunan->jeniskelamin == 0)
        <p>Perempuan</p>
    @else
        <p>Laki-Laki</p>
    @endif
</div>

<!-- Pendidikan Atau Kursus Field -->
<div class="form-group">
    {!! Form::label('pendidikan_atau_kursus', 'Pendidikan Atau Kursus:') !!}
    <p>{!! $kaderpembangunan->pendidikan_atau_kursus !!}</p>
</div>

<!-- Bidang Field -->
<div class="form-group">
    {!! Form::label('bidang', 'Bidang:') !!}
    <p>{!! $kaderpembangunan->bidang !!}</p>
</div>

<!-- Alamat Field -->
<div class="form-group">
    {!! Form::label('alamat', 'Alamat:') !!}
    <p>{!! $kaderpembangunan->alamat !!}</p>
</div>

<!-- Keterangan Field -->
<div class="form-group">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    <p>{!! $kaderpembangunan->keterangan !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Dibuat pada:') !!}
    <p>{!! $kaderpembangunan->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Diperbarui pada:') !!}
    <p>{!! $kaderpembangunan->updated_at !!}</p>
</div>

