@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Keterangan Usaha Baru
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'keteranganUsahaBarus.store']) !!}

                        @include('keterangan_usaha_barus.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
