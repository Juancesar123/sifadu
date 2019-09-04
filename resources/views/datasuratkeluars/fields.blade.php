<!-- Kode Surat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kode_surat', 'Kode Surat:') !!}
    {!! Form::text('kode_surat', null, ['class' => 'form-control']) !!}
</div>

<!-- Nomor Surat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomor_surat', 'Nomor Surat:') !!}
    {!! Form::text('nomor_surat', null, ['class' => 'form-control']) !!}
</div>

<!-- Penerima Field -->
<div class="form-group col-sm-6">
    {!! Form::label('penerima', 'Penerima:') !!}
    {!! Form::text('penerima', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Keluar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_keluar', 'Tanggal Keluar:') !!}
    {!! Form::date('tanggal_keluar', null, ['class' => 'form-control']) !!}
</div>

<!-- Perihahl Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('perihahl', 'Perihal:') !!}
    {!! Form::textarea('perihahl', null, ['class' => 'form-control summernote']) !!}
</div>

<!-- Tanda Tangan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanda_tangan', 'Tanda Tangan:') !!}
    {!! Form::text('tanda_tangan', null, ['class' => 'form-control']) !!}
</div>

<!-- Atas Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('atas_nama', 'Atas Nama:') !!}
    {!! Form::text('atas_nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('datasuratkeluars.index') !!}" class="btn btn-default">Cancel</a>
</div>
@section('scripts')
<script>
        $(document).ready(function() {
            $('.summernote').summernote();
        });
</script>
@endsection
 