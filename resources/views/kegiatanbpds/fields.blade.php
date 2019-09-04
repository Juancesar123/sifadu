<!-- Tentang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tentang', 'Tentang:') !!}
    {!! Form::text('tentang', null, ['class' => 'form-control']) !!}
</div>

<!-- Pelaksana Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pelaksana', 'Pelaksana:') !!}
    {!! Form::text('pelaksana', null, ['class' => 'form-control']) !!}
</div>

<!-- Pokok Kegiatan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pokok_kegiatan', 'Pokok Kegiatan:') !!}
    {!! Form::text('pokok_kegiatan', null, ['class' => 'form-control']) !!}
</div>

<!-- Hasil Kegiatan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hasil_kegiatan', 'Hasil Kegiatan:') !!}
    {!! Form::text('hasil_kegiatan', null, ['class' => 'form-control']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::textarea('keterangan', null, ['class' => 'form-control']) !!}
</div>

<!-- Tahun Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tahun', 'Tahun:') !!}
    {!! Form::text('tahun', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('kegiatanbpds.index') !!}" class="btn btn-default">Cancel</a>
</div>
