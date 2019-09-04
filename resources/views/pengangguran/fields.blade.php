<!-- No KKl Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nik', 'NIK :') !!}
    {!! Form::text('nik', null, ['class' => 'form-control', 'maxlength'=>16, 'minlength'=>16, 'required']) !!}
</div>

<!-- Nama ibu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama :') !!}
    {!! Form::text('nama', null, ['class' => 'form-control ' , 'required']) !!}
</div>

<!-- Nama bayi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('alamat', 'Alamat :') !!}
    {!! Form::text('alamat', null, ['class' => 'form-control ' , 'required']) !!}
</div>

<!-- alamat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('usia', 'Usia :') !!}
    {!! Form::text('usia', null, ['class' => 'form-control ', 'maxlength'=>3, 'required']) !!}
</div>

<!-- Jenis pengangguran Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_pengangguran', 'Jenis Pengangguran :') !!}
    {!! Form::select('jenis_pengangguran', array('Pengangguran terbuka' => 'Pengangguran terbuka', 'Pengangguran musiman' => 'Pengangguran musiman', 'Setengah pengangguran' => 'Setengah pengangguran'),null, ['class' => 'form-control' , 'required']) !!}
</div>

<!-- usaha sampingan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('usaha', 'Usaha Sampingan :') !!}
    {!! Form::text('usaha', null, ['class' => 'form-control ' , 'required']) !!}
</div>

<!-- pengalaman Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pengalaman', 'Pengalaman Bekerja :') !!}
    {!! Form::text('pengalaman', null, ['class' => 'form-control ' , 'required']) !!}
</div>

<!-- keterampilan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keterampilan', 'Keterampilan :') !!}
    {!! Form::text('keterampilan', null, ['class' => 'form-control ' , 'required']) !!}
</div>

<!-- pendidikan terakhir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pendidikan', 'Pendidikan Terakhir :') !!}
    {!! Form::select('pendidikan', array(
      'SD / sederajat' => 'SD / sederajat',
      'SMP / sederajat' => 'SMP / sederajat',
      'SMA / sederajat' => 'SMA / sederajat',
      'D1' => 'D1',
      'D2' => 'D2',
      'D3' => 'D3',
      'S3' => 'S3',
      'S2' => 'S2',
      'S1' => 'S1'),null, ['class' => 'form-control' , 'required']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pengangguran.index') !!}" class="btn btn-default">Batalkan</a>
</div>

@section('scripts')
<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
    // $('#nik, #usia').blur(function() {
    $('#nik').keyup(function() {
      $(this).val($(this).val().replace(/[^\d.-]/g, ''))
    })
});
</script>
@endsection