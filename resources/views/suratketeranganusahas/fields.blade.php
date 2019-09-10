<!-- Nik Field -->
<div class="form-group col-sm-6">
        {!! Form::label('nik_atau_nama', 'Nik:') !!}
        <select class="form-control js-example-basic-single" name="nik">
            @foreach($data as $key)
                <option value="{{$key->id}}">{{$key->nik}} - {{$key->nama_lengkap}}</option>
            @endforeach
        </select>
    </div>

<!-- Nomor Surat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomor_surat', 'Nomor Surat:') !!}
    {!! Form::text('nomor_surat', null, ['class' => 'form-control']) !!}
</div>

<!-- Nomor Surat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_usaha', 'Jenis Usaha:') !!}
    {!! Form::text('jenis_usaha', null, ['class' => 'form-control']) !!}
</div>

<!-- Footer Cetak Data Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('footer_cetak_data', 'Footer Cetak Data:') !!}
    {!! Form::textarea('footer_cetak_data', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('suratketeranganusahas.index') !!}" class="btn btn-default">Batalkan</a>
</div>
@section('scripts')
<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
@endsection