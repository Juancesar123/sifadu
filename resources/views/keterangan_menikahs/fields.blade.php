<!-- Nik Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nik_mempelai_satu', 'Nik Mempelai Laki Laki:') !!}
    <select class="form-control js-example-basic-single" name="nik_mempelai_satu" required="">
        @foreach($data as $key)
            <option value="{{$key->id}}">{{$key->nik}} - {{$key->nama_lengkap}}</option>
        @endforeach
    </select>
</div>

<!-- Nik Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nik_mempelai_dua', 'Nik Mempelai Perempuan:') !!}
    <select class="form-control js-example-basic-single" name="nik_mempelai_dua" required="">
        @foreach($data as $key)
            <option value="{{$key->id}}">{{$key->nik}} - {{$key->nama_lengkap}}</option>
        @endforeach
    </select>
</div>

<!-- Saksi Satu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('saksi_satu', 'Saksi Satu:') !!}
    {!! Form::text('saksi_satu', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Saksi Dua Field -->
<div class="form-group col-sm-6">
    {!! Form::label('saksi_dua', 'Saksi Dua:') !!}
    {!! Form::text('saksi_dua', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Nomor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomor', 'Nomor Surat:') !!}
    {!! Form::text('nomor', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Pembantu Ppn Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pembantu_ppn', 'Pembantu Ppn:') !!}
    {!! Form::text('pembantu_ppn', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Footer Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('footer', 'Footer Cetak Data:') !!}
    {!! Form::textarea('footer', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('keteranganMenikahs.index') !!}" class="btn btn-default">Cancel</a>
</div>

@section('scripts')
<script>
$(document).ready(function() {
	$('.js-example-basic-single').select2();
});
</script>
@endsection