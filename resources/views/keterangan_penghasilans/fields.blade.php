<!-- Nomor Surat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomor_surat', 'Nomor Surat:') !!}
    {!! Form::text('nomor_surat', null, ['class' => 'form-control']) !!}
</div>

<!-- Footer Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('footer', 'Footer:') !!}
    {!! Form::textarea('footer', null, ['class' => 'form-control']) !!}
</div>

<!-- Penghasilan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('penghasilan', 'Penghasilan:') !!}
    {!! Form::number('penghasilan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('keteranganPenghasilans.index') !!}" class="btn btn-default">Cancel</a>
</div>
