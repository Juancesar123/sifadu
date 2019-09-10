@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Keterangan Penghasilan
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'keteranganPenghasilans.store']) !!}

                        @include('keterangan_penghasilans.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
