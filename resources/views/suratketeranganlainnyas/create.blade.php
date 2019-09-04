@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Surat Keterangan Lainnya
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'suratketeranganlainnyas.store']) !!}

                        @include('suratketeranganlainnyas.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
