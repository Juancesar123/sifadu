<!-- Tentang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tentang', 'Tentang:') !!}
    {!! Form::text('tentang', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Pelaksana Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pelaksana', 'Pelaksana:') !!}
    {!! Form::text('pelaksana', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Pokok Kegiatan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pokok_kegiatan', 'Pokok Kegiatan:') !!}
    {!! Form::text('pokok_kegiatan', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Hasil Kegiatan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hasil_kegiatan', 'Hasil Kegiatan:') !!}
    {!! Form::text('hasil_kegiatan', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::textarea('keterangan', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Tahun Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tahun', 'Tahun:') !!}
    {!! Form::text('tahun', null, ['class' => 'form-control', 'maxlength'=>4, 'minlength'=>4, 'required']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('kegiatanbpds.index') !!}" class="btn btn-default">Batalkan</a>
</div>

@section('scripts')
<script>
$(document).ready(function(){
    $('#tahun').keyup(function() {
      $(this).val($(this).val().replace(/[^\d.-]/g, ''))
    })
})
</script>
@endsection