<!-- Penduduk Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('penduduk_id', 'Nama Lengkap:') !!}
    <select class="form-control js-example-basic-single" id="penduduk_id" name="penduduk_id">
        @foreach($data as $key)
            <option value="{{$key->id}}">{{$key->nama_lengkap}}</option>
        @endforeach
    </select>
</div>

<!-- NIK Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nik', 'NIK :') !!}
    {!! Form::text('nik', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- NO KK Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_kk', 'No KK :') !!}
    {!! Form::text('no_kk', null, ['class' => 'form-control', 'required']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('kemiskinan.index') !!}" class="btn btn-default">Batalkan</a>
</div>
@section('scripts')
<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});


// var penduduk_id = getElementsById('penduduk_id');

jQuery(document).ready(function(){
            jQuery('#penduduk_id').change(function(e){
               e.preventDefault();
               jQuery.ajax({
                  url: "{{ url('/kemiskinan/getnik') }}",
                  method: 'get',
                  success: function(response){
                     console.log(response);
                  }});
               });
            });
</script>
@endsection
