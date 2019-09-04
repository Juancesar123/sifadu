<!-- No Keputusan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_keputusan', 'No Keputusan:') !!}
    {!! Form::text('no_keputusan', null, ['class' => 'form-control']) !!}
</div>

<!-- Tentang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tentang', 'Tentang:') !!}
    {!! Form::text('tentang', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Keputusan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_keputusan', 'Tanggal Keputusan:') !!}
    {!! Form::date('tanggal_keputusan', null, ['class' => 'form-control']) !!}
</div>

<!-- Uraian Singkat Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('uraian_singkat', 'Uraian Singkat:') !!}
    {!! Form::textarea('uraian_singkat', null, ['class' => 'form-control']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::textarea('keterangan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('keputusanbpds.index') !!}" class="btn btn-default">Cancel</a>
</div>
