<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Kelamin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_kelamin', 'Jenis Kelamin:') !!}
    {!! Form::select('jenis_kelamin', ['1' => 'Laki-Laki', '0' => 'Perempuan'], null, ['class' => 'form-control']) !!}
</div>

<!-- Tempat Lahir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tempat_lahir', 'Tempat Lahir:') !!}
    {!! Form::text('tempat_lahir', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Lahir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_lahir', 'Tanggal Lahir:') !!}
    {!! Form::date('tanggal_lahir', isset($data->tanggal_lahir) ? $data->tanggal_lahir : null, ['class' => 'form-control']) !!}
</div>

<!-- Agama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('agama', 'Agama:') !!}
    {!! Form::select('agama', ['1' => 'Islam', '2' => 'Kristen', '3' => 'Katolik', '4' => 'Hindu', '5' => 'Budha', '6' => 'Lainnya'], null, ['class' => 'form-control']) !!}
</div>

<!-- Pendidikan Terakhir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pendidikan_terakhir', 'Pendidikan Terakhir:') !!}
    {!! Form::text('pendidikan_terakhir', null, ['class' => 'form-control']) !!}
</div>

<!-- Nomor Keputusan Pengangkatan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomor_keputusan_pengangkatan', 'Nomor Keputusan Pengangkatan:') !!}
    {!! Form::text('nomor_keputusan_pengangkatan', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Keputusan Pengangkatan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_keputusan_pengangkatan', 'Tanggal Keputusan Pengangkatan:') !!}
    {!! Form::date('tanggal_keputusan_pengangkatan', isset($data->tanggal_keputusan_pengangkatan) ? $data->tanggal_keputusan_pengangkatan : null, ['class' => 'form-control']) !!}
</div>

<!-- Nomor Keputusan Pemberentian Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomor_keputusan_pemberentian', 'Nomor Keputusan Pemberentian:') !!}
    {!! Form::text('nomor_keputusan_pemberentian', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Keputusan Pemberentian Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_keputusan_pemberentian', 'Tanggal Keputusan Pemberentian:') !!}
    {!! Form::date('tanggal_keputusan_pemberentian', isset($data->tanggal_keputusan_pemberentian) ? $data->tanggal_keputusan_pemberentian : null, ['class' => 'form-control']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::textarea('keterangan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('anggotabpds.index') !!}" class="btn btn-default">Batalkan</a>
</div>
