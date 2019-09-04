    {!! Form::label($input_name, $input_label.':') !!}
    {!! Form::hidden($input_name, null, ['class' => 'form-control']) !!}

    <button type="button" id="button_new">Buat zona</button>
    <span {!! (isset($button_new_point_display) && !$button_new_point_display) ? 'style="display:none"' : 'style="visibility:hidden"'!!}>
        <button type="button" id="button_new_point">Buat titik</button>
    </span>
    
    <button type="button" id="button_edit" hidden disabled>Ubah lokasi</button>
    <button type="button" id="button_delete" hidden disabled>Bersihkan lokasi</button>
    <button type="button" id="button_save" hidden disabled>Simpan perubahan</button>
    <button type="button" id="button_cancel" hidden disabled>Batalkan perubahan</button>
    <div style="width:66.6%;height: 400px;" id="map_input"></div>

    <script>
    var map_center = <?php list($lat, $lng) = explode('_', config('map.center')); echo "[ $lat, $lng]"; ?>,
        default_zoom = 15,
        zona_input_id='{{$input_name}}';

    @if ($input_data != Null)
    var json_data = @JSON($input_data);
    @else
    var json_data = null;
    @endif
    </script>

