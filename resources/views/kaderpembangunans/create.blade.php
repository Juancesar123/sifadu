@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Kader Pembangunan
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'kaderpembangunans.store']) !!}

                        @include('kaderpembangunans.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
