<!-- Blok Field -->
<div class="form-group col-sm-6">
    {!! Form::label('blok', 'Blok:') !!}
    {!! Form::text('blok', null, ['class' => 'form-control']) !!}
</div>

<!-- Dusun Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dusun', 'Dusun:') !!}
    {!! Form::text('dusun', null, ['class' => 'form-control']) !!}
</div>

<!-- Nop Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nop', 'Nop:') !!}
    {!! Form::text('nop', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Wp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_wp', 'Nama Wp:') !!}
    {!! Form::text('nama_wp', null, ['class' => 'form-control']) !!}
</div>

<!-- Alamat Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('alamat', 'Alamat:') !!}
    {!! Form::textarea('alamat', null, ['class' => 'form-control']) !!}
</div>

<!-- Ketetapan Pembayaran Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ketetapan_pembayaran', 'Ketetapan Pembayaran:') !!}
    {!! Form::text('ketetapan_pembayaran', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pajaktanahs.index') !!}" class="btn btn-default">Batalkan</a>
</div>

@section('scripts')
<script>
$(document).ready(function(){
    $('#ketetapan_pembayaran').keyup(function() {
      $(this).val($(this).val().replace(/[^\d.-]/g, ''))
    })
})
</script>
@endsection