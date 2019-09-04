<!-- Nama Proyek Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_proyek', 'Nama Proyek:') !!}
    {!! Form::text('nama_proyek', null, ['class' => 'form-control']) !!}
</div>

<!-- Volume Field -->
<div class="form-group col-sm-6">
    {!! Form::label('volume', 'Volume:') !!}
    {!! Form::text('volume', null, ['class' => 'form-control']) !!}
</div>

<!-- Biaya Field -->
<div class="form-group col-sm-6">
    {!! Form::label('biaya', 'Biaya:') !!}
    {!! Form::text('biaya', null, ['class' => 'form-control money']) !!}
</div>

<!-- Lokasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lokasi', 'Lokasi:') !!}
    {!! Form::text('lokasi', null, ['class' => 'form-control']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::textarea('keterangan', null, ['class' => 'form-control']) !!}
</div>

<!-- Tahun Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tahun', 'Tahun:') !!}
    {!! Form::text('tahun', null, ['class' => 'form-control', 'maxlength'=>4, 'minlength'=>4]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('inventarisproyeks.index') !!}" class="btn btn-default">Batalkan</a>
</div>

@section('scripts')
<script>
$('document').ready(function(){
    $('.money').mask('000.000.000.000.000,00', {reverse: true});
    $('#tahun').keyup(function() {
      $(this).val($(this).val().replace(/[^\d.-]/g, ''))
    })
})
</script>
@endsection