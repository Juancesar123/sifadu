<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $customData->id !!}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{!! $customData->title !!}</p>
</div>

<!-- Category Field -->
<div class="form-group">
    {!! Form::label('category', 'Category:') !!}
    <p>{!! $customData->category !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $customData->description !!}</p>
</div>

<!-- Option Field -->
<div class="form-group">
    {!! Form::label('option', 'Option:') !!}
    <p>{!! $customData->option !!}</p>
</div>

<!-- Geom Field -->
@include('leaflet.leaflet_1_3')
<!-- Batas zona Field -->
<div class="form-group">
    @include('leaflet.show_custom', [
        'input_name' => 'geom', 
        'input_label' => 'Lokasi:', 
        'input_data' => (isset($customData)) ? $customData->geom : Null,
        'input_option' => (isset($customData)) ? $customData->option : Null,
    ])
</div>
@include('leaflet.show_custom_js')

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $customData->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $customData->updated_at !!}</p>
</div>

