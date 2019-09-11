<!-- Nik Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nik_suami', 'Nik Suami:') !!}
    <select class="form-control js-example-basic-single" name="nik_suami" required="">
        @foreach($data as $key)
            <option value="{{$key->id}}">{{$key->nik}} - {{$key->nama_lengkap}}</option>
        @endforeach
    </select>
</div>

<!-- Nik Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nik_istri', 'Nik Istri:') !!}
    <select class="form-control js-example-basic-single" name="nik_istri" required="">
        @foreach($data as $key)
            <option value="{{$key->id}}">{{$key->nik}} - {{$key->nama_lengkap}}</option>
        @endforeach
    </select>
</div>

<!-- Nomor Surat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomor_surat', 'Nomor Surat:') !!}
    {!! Form::text('nomor_surat', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Tanggal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal', 'Tanggal Kelahiran Anak:') !!}
    {!! Form::date('tanggal', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Tempat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tempat', 'Tempat Kelahiran Anak:') !!}
    {!! Form::text('tempat', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama Anak:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- anakKe Field -->
<div class="form-group col-sm-6">
    {!! Form::label('anak_ke', 'Anak Ke:') !!}
    {!! Form::text('anak_ke', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('jenis_kelamin', 'jenis_kelamin:') !!}
	<select class="form-control js-example-basic-single" name="jenis_kelamin" required="">
	    <option value="1">Laki Laki</option>
	    <option value="2">Perempuan</option>
	</select>
</div>

<!-- Footer Cetak Data Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('footer', 'Footer Cetak Data:') !!}
    {!! Form::textarea('footer', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('keterangan-kelahiran.index') !!}" class="btn btn-default">Cancel</a>
</div>

@section('scripts')
<script>
$(document).ready(function() {
	$('.js-example-basic-single').select2();
});
</script>
@endsection