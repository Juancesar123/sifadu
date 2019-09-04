@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Paket
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('paket.show_fields')
                    <a href="{!! route('paket.index') !!}" class="btn btn-default">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
