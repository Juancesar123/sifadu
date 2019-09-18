@extends('layouts.app')

@section('content')
	<section class="content-header">
		<h1 class="pull-left">Logo Banner Home</h1>
		<h1 class="pull-right">
		</h1>
	</section>
	<div class="content">
		<div class="clearfix"></div>

		@include('flash::message')

		<div class="clearfix"></div>
		<div class="box box-primary">
			<div class="box-body">
				<div class="col-sm-12 col-md-4">
					<img class="img-responsive" src="{{ asset('img/logo/'.$logo->value) }}">
					<br>
					<form action="{{ url('/logo-banner-home') }}" method="POST" enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="_method" value="PUT" required>
						<input id="filename" type="hidden" name="_filename" required>
						<label>
							Pilih Logo Baru
							<input id="file" type="file" name="logo" accept="image/*" required>
						</label>
						<br>
						<input class="btn btn-primary" type="submit" value="Simpan">
					</form>
				</div>
			</div>
		</div>
		<div class="text-center">

		</div>
	</div>
@endsection
@section('scripts')
<script>
$(document).ready(function() {
	$('#file').change(function() {
		$('#filename').val($(this)[0].files[0].name);
	});
});
</script>
@endsection