
<!-- Id Penduduk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_penduduk', 'Id Penduduk:') !!}
    {!! Form::number('id_penduduk', $penduduk->id, ['class' => 'form-control', 'readonly']) !!}
</div>

<!-- Id Indikator Kemiskinan Field -->
<div class="form-group col-sm-12">
    {!! Form::label('id_indikator_kemiskinan', 'Indikator Kemiskinan:') !!}
    @foreach($indikator as $item)
	    <br>
	    <label style="font-weight: normal;">
	    	<input type="checkbox" name="id_indikator_kemiskinan[]" value="{{$item->id}}"
	    	{{ in_array($item->id, array_column($penduduk->kemiskinan->toArray(), 'id_indikator_kemiskinan')) ? 'checked' :'' }}>
	    	{{ $item->indikator_kemiskinan }}
	    </label>
    @endforeach
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('kemiskinan.index') !!}" class="btn btn-default">Cancel</a>
</div>

@section('scripts')
<script>
	$(document).ready(function() {
		$('.js-example-basic-single').select2();
	});
</script>
@endsection