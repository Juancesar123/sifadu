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
    {!! Form::label('nomor', 'Nomor:') !!}
    {!! Form::text('nomor', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Footer Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('footer', 'Footer:') !!}
    {!! Form::textarea('footer', null, ['class' => 'form-control', 'required']) !!}
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

<!-- Alamat Tempat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('alamat_tempat', 'Alamat Tempat:') !!}
    {!! Form::number('alamat_tempat', null, ['class' => 'form-control', 'required']) !!}
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