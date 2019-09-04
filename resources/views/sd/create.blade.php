@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            SD/MI
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'sd.store']) !!}

                        @include('sd.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
