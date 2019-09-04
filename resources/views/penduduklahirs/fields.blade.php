<!-- No KKl Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_kk', 'No KK :') !!}
    {!! Form::number('no_kk', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Nama ibu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_ibu', 'Nama Ibu :') !!}
    {!! Form::text('nama_ibu', null, ['class' => 'form-control ' , 'required']) !!}
</div>

<!-- Nama bayi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_bayi', 'Nama Bayi :') !!}
    {!! Form::text('nama_bayi', null, ['class' => 'form-control ' , 'required']) !!}
</div>

<!-- Jenis kelamin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_kelamin', 'Jenis Kelamin :') !!}
    {!! Form::select('jenis_kelamin', array('Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'),null, ['class' => 'form-control' , 'required']) !!}
</div>

<!-- tgl lahir kelamin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tgl_lahir', 'Tanggal Lahir :') !!}
    {!! Form::date('tgl_lahir', null, ['class' => 'form-control ' , 'required']) !!}
</div>

<!-- tgl lahir kelamin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('waktu_lahir', 'Waktu Lahir :') !!}
    {!! Form::text('waktu_lahir', null, ['class' => 'form-control ' , 'required']) !!}
</div>

<!-- tgl lahir kelamin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tempat_lahir', 'Tempat Lahir :') !!}
    {!! Form::text('tempat_lahir', null, ['class' => 'form-control ' , 'required']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('penduduklahirs.index') !!}" class="btn btn-default">Batalkan</a>
</div>

@section('scripts')
<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
@endsection
