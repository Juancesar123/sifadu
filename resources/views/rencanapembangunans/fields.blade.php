<!-- Nama Proyek Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_proyek', 'Nama Proyek:') !!}
    {!! Form::text('nama_proyek', null, ['class' => 'form-control']) !!}
</div>

<!-- Lokasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lokasi', 'Lokasi:') !!}
    {!! Form::text('lokasi', null, ['class' => 'form-control']) !!}
</div>

<!-- Dana Dari Pemerintah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dana_dari_pemerintah', 'Dana Dari Pemerintah:') !!}
    {!! Form::text('dana_dari_pemerintah', null, ['class' => 'form-control money']) !!}
</div>

<!-- Dana Dari Provinsi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dana_dari_provinsi', 'Dana Dari Provinsi:') !!}
    {!! Form::text('dana_dari_provinsi', null, ['class' => 'form-control money']) !!}
</div>

<!-- Dana Dari Kabupaten Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dana_dari_kabupaten', 'Dana Dari Kabupaten:') !!}
    {!! Form::text('dana_dari_kabupaten', null, ['class' => 'form-control money']) !!}
</div>

<!-- Dana Dari Swadaya Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dana_dari_swadaya', 'Dana Dari Swadaya:') !!}
    {!! Form::text('dana_dari_swadaya', null, ['class' => 'form-control money']) !!}
</div>
<div class="form-group col-sm-6">
        {!! Form::label('tahun', 'Tahun:') !!}
        {!! Form::text('tahun', null, ['class' => 'form-control']) !!}
    </div>
<!-- Jumlah Dana Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah_dana', 'Jumlah Dana:') !!}
    {!! Form::text('jumlah_dana', null, ['class' => 'form-control money']) !!}
</div>

<!-- Pelaksana Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pelaksana', 'Pelaksana:') !!}
    {!! Form::text('pelaksana', null, ['class' => 'form-control']) !!}
</div>

<!-- Manfaat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('manfaat', 'Manfaat:') !!}
    {!! Form::text('manfaat', null, ['class' => 'form-control']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::textarea('keterangan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('rencanapembangunans.index') !!}" class="btn btn-default">Cancel</a>
</div>
@section('scripts')
<script>
$('document').ready(function(){
    $('.money').mask('000.000.000.000.000,00', {reverse: true});
})
</script>
@endsection