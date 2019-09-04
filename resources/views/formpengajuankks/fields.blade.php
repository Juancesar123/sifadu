<!-- Nik Atau Nama Field -->
<div class="form-group col-sm-6">
        {!! Form::label('nik_atau_nama', 'NIK - Nama:') !!}
        <select class="form-control js-example-basic-single" name="nik_atau_nama">
            @foreach($data as $key)
                <option value="{{$key->id}}">{{$key->nik}} - {{$key->nama_lengkap}}</option>
            @endforeach
        </select>
        {{-- {!! Form::label('nomor_surat', 'Nomor Surat:') !!}
        {!! Form::text('nomor_surat', null, ['class' => 'form-control']) !!} --}}
        {!! Form::label('footer_cetak_data', 'Footer Cetak Data:') !!}
        {!! Form::textarea('footer_cetak_data', null, ['class' => 'form-control', 'rows' => 5]) !!}
</div>  

<!-- Nama kepala keluarga yang mengajukan KK -->
<div class="form-group col-sm-6">
        {!! Form::label('jumlah_keluarga', 'Jumlah Anggota Keluarga:') !!}
        {!! Form::number('jumlah_keluarga', null, ['class' => 'form-control']) !!}
        {!! Form::label('telepon', 'Nomor HP:') !!}
        {!! Form::text('telepon', null, ['class' => 'form-control']) !!}
</div>
 
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('formpengajuankk.index') !!}" class="btn btn-default">{{__('Cancel')}}</a>
</div>
@section('scripts')
<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
@endsection