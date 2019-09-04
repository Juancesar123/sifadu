<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Umur Field -->
<div class="form-group col-sm-6">
    {!! Form::label('umur', 'Umur:') !!}
    {!! Form::text('umur', null, ['class' => 'form-control']) !!}
</div>

<!-- Jeniskelamin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jeniskelamin', 'Jeniskelamin:') !!}
    {!! Form::select('jeniskelamin', ['0' => 'Perempuan', '1' => 'Laki-Laki'], null, ['class' => 'form-control']) !!}
</div>

<!-- Pendidikan Atau Kursus Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pendidikan_atau_kursus', 'Pendidikan Atau Kursus:') !!}
    {!! Form::text('pendidikan_atau_kursus', null, ['class' => 'form-control']) !!}
</div>

<!-- Bidang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bidang', 'Bidang:') !!}
    {!! Form::text('bidang', null, ['class' => 'form-control']) !!}
</div>

<!-- Alamat Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('alamat', 'Alamat:') !!}
    {!! Form::textarea('alamat', null, ['class' => 'form-control']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::textarea('keterangan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('kaderpembangunans.index') !!}" class="btn btn-default">Batalkan</a>
</div>
