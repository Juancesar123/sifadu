@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Kegiatan Pembangunan
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'kegiatanpembangunans.store']) !!}

                        @include('kegiatanpembangunans.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
