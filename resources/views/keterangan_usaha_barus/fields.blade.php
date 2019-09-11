<!-- Nik Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nik_atau_nama', 'Nik:') !!}
    <select class="form-control js-example-basic-single" name="nik" required="">
        @foreach($data as $key)
            <option value="{{$key->id}}">{{$key->nik}} - {{$key->nama_lengkap}}</option>
        @endforeach
    </select>
</div>

<!-- Nomor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomor', 'Nomor Surat:') !!}
    {!! Form::text('nomor', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Nomor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama Lembaga:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Jenis Usaha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_usaha', 'Jenis Usaha:') !!}
    {!! Form::text('jenis_usaha', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Luas Tempat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('luas_tempat', 'Luas Tempat:') !!}
    {!! Form::number('luas_tempat', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Nomor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('badan_hukum', 'Badan Hukum:') !!}
    {!! Form::text('badan_hukum', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Nomor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sk_hukum_ham', 'SK Hukum & HAM:') !!}
    {!! Form::text('sk_hukum_ham', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Nomor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_npwp', 'Nomor NPWP:') !!}
    {!! Form::text('no_npwp', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Alamat Tempat Field -->
<div class="form-group col-sm-12">
    {!! Form::label('alamat_tempat', 'Alamat Tempat:') !!}
    {!! Form::textarea('alamat_tempat', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Footer Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('footer', 'Footer:') !!}
    {!! Form::textarea('footer', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('keteranganUsahaBarus.index') !!}" class="btn btn-default">Cancel</a>
</div>

@section('scripts')
<script>
$(document).ready(function() {
	$('.js-example-basic-single').select2();
});
</script>
@endsection