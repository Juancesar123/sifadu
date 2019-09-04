<!-- Nik Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nik_atau_nama', 'Nik:') !!}
    <select class="form-control js-example-basic-single" name="nik">
        <option value="">Pilih No KTP-Nama</option>
        @foreach($data as $key)
            <option value="{{$key->id}}">{{$key->nik}} - {{$key->nama_lengkap}}</option>
        @endforeach
    </select>
</div>

<!-- Nomor Surat Field -->
{{-- <div class="form-group col-sm-3">
    {!! Form::label('nomor_surat', 'Nomor Surat:') !!}
    {!! Form::text('nomor_surat', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
</div> --}}

<div class="form-group col-sm-6">
    {!! Form::label('id_pekerjaan', 'Pekerjaan:') !!}
    <select class="form-control js-example-basic-single" name="id_pekerjaan">
        <option value="">Pilih Pekerjaan</option>
        @foreach($work as $su)
            <option value="{{$su->id}}">{{$su->jenis_pekerjaan}}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('start_date', 'Tanggal Berlaku:') !!}
    {!! Form::date('start_date', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('end_date', 'Tanggal Berakhir:') !!}
    {!! Form::date('end_date', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('keperluan', 'Keperluan:') !!}
    {!! Form::textarea('keperluan', null, ['class' => 'form-control', 'rows' => '3']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::textarea('keterangan', null, ['class' => 'form-control', 'rows' => '3']) !!}
</div>

<!-- Footer Cetak Data Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('footer_cetak_data', 'Footer Cetak Data:') !!}
    {!! Form::textarea('footer_cetak_data', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('suratketeranganskcks.index') !!}" class="btn btn-default">Cancel</a>
</div>

@section('scripts')
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
@endsection