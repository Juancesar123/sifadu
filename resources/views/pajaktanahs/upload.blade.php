<div class="form-group col-sm-6">
	{!! Form::label('fileexcel', 'Upload Data excel Penduduk:') !!}
	<input accept=".xls/.xlsx" name="fileexcel" class="form-control" type="file" id="fileexcel" required>
</div>
<div class="form-group col-sm-12">
	{!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
	<a href="{!! route('pajaktanahs.index') !!}" class="btn btn-default">Batalkan</a>
</div>

@section('scripts')
<script>
	$(document).ready(function() {
		var fileexcelInput = $('#fileexcel')[0].outerHTML;
		$('#fileexcel').change(function() {
			var fileExt = $(this)[0].files[0].type.split('/')[1]
			if (fileExt != 'xls' || fileExt != 'xlsx') {
				alert('File harus berupa .xls atau .xlsx');
				$('#fileexcel')[0].outerHTML = fileexcelInput;
			}
		});
	});
</script>
@endsection