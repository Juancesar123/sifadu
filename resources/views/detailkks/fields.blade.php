
 
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('formpengajuankk.index') !!}" class="btn btn-default">{{__('Cancel')}}</a>
</div>
@section('scripts')
<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
@endsection