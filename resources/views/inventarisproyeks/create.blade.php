@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Inventaris Proyek
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'inventarisproyeks.store']) !!}

                        @include('inventarisproyeks.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
