<!-- Nomor Urut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomor_urut', 'Nomor Urut:') !!}
    {!! Form::text('nomor_urut', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Pengiriman Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_pengiriman', 'Tanggal Pengiriman:') !!}
    {!! Form::date('tanggal_pengiriman', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Surat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_surat', 'Tanggal Surat:') !!}
    {!! Form::date('tanggal_surat', null, ['class' => 'form-control']) !!}
</div>

<!-- Nomor Surat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomor_surat', 'Nomor Surat:') !!}
    {!! Form::text('nomor_surat', null, ['class' => 'form-control']) !!}
</div>

<!-- Isi Surat Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('isi_surat', 'Isi Surat:') !!}
    {!! Form::textarea('isi_surat', null, ['class' => 'form-control']) !!}
</div>

<!-- Surat Yang Dituju Field -->
<div class="form-group col-sm-6">
    {!! Form::label('surat_yang_dituju', 'Surat Yang Dituju:') !!}
    {!! Form::text('surat_yang_dituju', null, ['class' => 'form-control']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::textarea('keterangan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('dataekspedisis.index') !!}" class="btn btn-default">Cancel</a>
</div>
