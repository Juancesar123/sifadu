<!-- No Ktp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_KTP', 'No Ktp:') !!}
    {!! Form::text('no_KTP', null, ['class' => 'form-control', 'maxlength'=>16, 'minlength'=>16, 'required']) !!}
</div>

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Alamat Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('alamat', 'Alamat:') !!}
    {!! Form::textarea('alamat', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Pekerjaan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pekerjaan', 'Pekerjaan:') !!}
    {!! Form::text('pekerjaan', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('daftarPemilihTetaps.index') !!}" class="btn btn-default">Batalkan</a>
</div>

@section('scripts')
<script>
$(document).ready(function() {
    $('#no_KTP').keyup(function() {
      $(this).val($(this).val().replace(/[^\d.-]/g, ''))
    })
});
</script>
@endsection