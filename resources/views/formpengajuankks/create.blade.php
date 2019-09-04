@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{ __('Form Pengajuan Kartu Keluarga') }}
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'formpengajuankk.store']) !!}

                        @include('formpengajuankks.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
