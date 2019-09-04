<!-- Penduduk Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('penduduk_id', 'Nama Lengkap:') !!}
    <select class="form-control js-example-basic-single" name="penduduk_id">
        @foreach($data as $key)
            <option value="{{$key->id}}">{{$key->nama_lengkap}}</option>
        @endforeach
    </select>
</div>

<!-- Tanggal Pindah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_pindah', 'Tanggal Pindah:') !!}
    {!! Form::date('tanggal_pindah', null, ['class' => 'form-control']) !!}
</div>

<!-- Keterangan Pindah Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('keterangan_pindah', 'Keterangan Pindah:') !!}
    {!! Form::textarea('keterangan_pindah', null, ['class' => 'form-control']) !!}
</div>

<!-- Pindah Ke Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('pindah_ke', 'Pindah Ke:') !!}
    {!! Form::textarea('pindah_ke', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pendudukpindahs.index') !!}" class="btn btn-default">Cancel</a>
</div>
@section('scripts')
<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
@endsection