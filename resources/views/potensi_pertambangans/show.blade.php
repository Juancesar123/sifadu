@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Potensi Pertambangan
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('potensi_pertambangans.show_fields')
                    <a href="{!! route('potensiPertambangans.index') !!}" class="btn btn-default">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
