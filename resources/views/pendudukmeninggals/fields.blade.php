<!-- Penduduk Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('penduduk_id', 'Penduduk Id:') !!}
    <select class="form-control js-example-basic-single" name="penduduk_id">
        @foreach($data as $key)
            <option value="{{$key->id}}">{{$key->nama_lengkap}}</option>
        @endforeach
      </select>
</div>

<!-- Tanggal Meninggal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_meninggal', 'Tanggal Meninggal:') !!}
    {!! Form::date('tanggal_meninggal', isset($data->tanggal_meninggal) ? $data->tanggal_meninggal : null, ['class' => 'form-control ']) !!}
</div>

<!-- Keterangan Meninggal Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('keterangan_meninggal', 'Keterangan Meninggal:') !!}
    {!! Form::textarea('keterangan_meninggal', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pendudukmeninggals.index') !!}" class="btn btn-default">Batalkan</a>
</div>

@section('scripts')
<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
@endsection