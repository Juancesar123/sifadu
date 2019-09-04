@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Perguruan Tinggi
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'pt.store']) !!}

                        @include('pt.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
