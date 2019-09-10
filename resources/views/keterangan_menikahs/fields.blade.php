<!-- Nomor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomor', 'Nomor:') !!}
    {!! Form::text('nomor', null, ['class' => 'form-control']) !!}
</div>

<!-- Footer Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('footer', 'Footer:') !!}
    {!! Form::textarea('footer', null, ['class' => 'form-control']) !!}
</div>

<!-- Nik Mempelai Satu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nik_mempelai_satu', 'Nik Mempelai Satu:') !!}
    {!! Form::number('nik_mempelai_satu', null, ['class' => 'form-control']) !!}
</div>

<!-- Nik Mempelai Dua Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nik_mempelai_dua', 'Nik Mempelai Dua:') !!}
    {!! Form::number('nik_mempelai_dua', null, ['class' => 'form-control']) !!}
</div>

<!-- Saksi Satu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('saksi_satu', 'Saksi Satu:') !!}
    {!! Form::text('saksi_satu', null, ['class' => 'form-control']) !!}
</div>

<!-- Saksi Dua Field -->
<div class="form-group col-sm-6">
    {!! Form::label('saksi_dua', 'Saksi Dua:') !!}
    {!! Form::text('saksi_dua', null, ['class' => 'form-control']) !!}
</div>

<!-- Pembantu Ppn Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pembantu_ppn', 'Pembantu Ppn:') !!}
    {!! Form::text('pembantu_ppn', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('keteranganMenikahs.index') !!}" class="btn btn-default">Cancel</a>
</div>
