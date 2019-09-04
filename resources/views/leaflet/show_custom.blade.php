    {!! Form::label($input_name, $input_label.':') !!}
    {{-- <p>{!! $input_data !!}</p> --}}
    <div style="width:500px;height: 200px;" id="map_input"></div>

    <script>
    var map_center = <?php list($lat, $lng) = explode('_', config('map.center')); echo "[ $lat, $lng]"; ?>,
        default_zoom = 15;

    @if ($input_data != Null)
    var json_data = @JSON($input_data);
    @else
    var json_data = null;
    @endif

    var option_color='{{isset($input_option) ? $input_option : '#3388ff'}}';
    </script>

