@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Parameter Indikator Kemiskinan
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'parameterIndikatorKemiskinans.store']) !!}

                        @include('parameter_indikator_kemiskinans.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
