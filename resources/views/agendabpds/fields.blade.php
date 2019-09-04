<!-- Tanggal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    {!! Form::text('tanggal', isset($data->tanggal) ? $data->tanggal : null, ['class' => 'form-control']) !!}
</div>

<!-- Nomor Surat Masuk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomor_surat_masuk', 'Nomor Surat Masuk:') !!}
    {!! Form::text('nomor_surat_masuk', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Surat Masuk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_surat_masuk', 'Tanggal Surat Masuk:') !!}
    {!! Form::date('tanggal_surat_masuk', isset($data->tanggal_surat_masuk) ? $data->tanggal_surat_masuk : null, ['class' => 'form-control']) !!}
</div>

<!-- Pengirim Surat Masuk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pengirim_surat_masuk', 'Pengirim Surat Masuk:') !!}
    {!! Form::text('pengirim_surat_masuk', null, ['class' => 'form-control']) !!}
</div>

<!-- Isi Singkat Surat Masuk Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('isi_singkat_surat_masuk', 'Isi Singkat Surat Masuk:') !!}
    {!! Form::textarea('isi_singkat_surat_masuk', null, ['class' => 'form-control']) !!}
</div>

<!-- Isi Singkat Surat Keluar Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('isi_singkat_surat_keluar', 'Isi Singkat Surat Keluar:') !!}
    {!! Form::textarea('isi_singkat_surat_keluar', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Pengiriman Surat Keluar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_pengiriman_surat_keluar', 'Tanggal Pengiriman Surat Keluar:') !!}
    {!! Form::date('tanggal_pengiriman_surat_keluar', isset($data->tanggal_pengiriman_surat_keluar) ? $data->tanggal_pengiriman_surat_keluar : null, ['class' => 'form-control']) !!}
</div>

<!-- Tujuan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tujuan', 'Tujuan:') !!}
    {!! Form::text('tujuan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('agendabpds.index') !!}" class="btn btn-default">Batalkan</a>
</div>
