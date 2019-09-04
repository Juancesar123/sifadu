
<div class="form-group col-sm-6">
    {!! Form::label('attribute', 'Attribute :') !!}
    {!! Form::text('attribute', null, ['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('value', 'Value :') !!}
    {!! Form::text('value', null, ['class' => 'form-control ' , 'required']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('setting.index') !!}" class="btn btn-default">Batalkan</a>
</div>


@section('scripts')
<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
@endsection
