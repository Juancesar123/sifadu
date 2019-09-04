@extends('layouts.app')

@section('css')

<meta name="csrf-token" content="{{ csrf_token() }}">
    
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Custom Data
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'customDatas.store']) !!}

                        @include('custom_datas.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
$(function(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $('#Cat').on('change', function(){
        $('#SubCat').empty();
        val = $('#Cat').val()
        console.log("TCL: val", val)
        sub = $('#SubCat')
        
        $.ajax({
            url: "/marker/select/"+val,
            type: 'GET',
            data: { _token: CSRF_TOKEN},
            success: function (response) {
                sub.empty();
                response.map( e => {
                    if (e == null){
                        sub.prop('disabled', true);
                    } else {
                        sub.append(`<option value=${e}>${e}</option>`)
                    }
                })
            },
            error: function (response){
                sub.empty()
                sub.prop('disabled', true);
            }
        });
    })
})
</script>
@endsection


