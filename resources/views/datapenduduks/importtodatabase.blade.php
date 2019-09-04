@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Data Penduduk(Export File)
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['url' => 'prosesuploaddatapenduduk','files'=>true]) !!}

                        @include('datapenduduks.fieldsupload')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
