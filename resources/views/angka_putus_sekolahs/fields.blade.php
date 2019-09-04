<!-- No Ktp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_kk', 'No KK :') !!}
    {!! Form::number('no_kk', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- tempat lahir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tempat_lahir', 'Tempat Lahir :') !!}
    {!! Form::text('tempat_lahir', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- tgl lahir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tgl_lahir', 'Tanggal Lahir :') !!}
    {!! Form::date('tgl_lahir', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- pendidikan terakhir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pendidikan_terakhir', 'Pendidikan Terakhir :') !!}
    {!! Form::select('pendidikan_terakhir', ['SD / Sederajat' => 'SD / Sederajat', 'SMP / Sederajat' => 'SMP / Sederajat', 'SMA / Sederajat' => 'SMA / Sederajat'], null, ['class' => 'form-control', 'placeholder' => '--- status lahan ---', 'required']); !!}
</div>

<!-- kelas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kelas', 'Kelas :') !!}
    {!! Form::text('kelas', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- penyebab Field -->
<div class="form-group col-sm-6">
    {!! Form::label('penyebab', 'Penyebab Putus Sekolah :') !!}
    {!! Form::text('penyebab', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('angkaPutusSekolahs.index') !!}" class="btn btn-default">Cancel</a>
</div>
