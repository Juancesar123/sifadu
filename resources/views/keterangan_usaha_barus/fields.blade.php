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

<!-- Jenis Usaha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_usaha', 'Jenis Usaha:') !!}
    {!! Form::text('jenis_usaha', null, ['class' => 'form-control']) !!}
</div>

<!-- Luas Tempat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('luas_tempat', 'Luas Tempat:') !!}
    {!! Form::number('luas_tempat', null, ['class' => 'form-control']) !!}
</div>

<!-- Alamat Tempat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('alamat_tempat', 'Alamat Tempat:') !!}
    {!! Form::number('alamat_tempat', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('keteranganUsahaBarus.index') !!}" class="btn btn-default">Cancel</a>
</div>
