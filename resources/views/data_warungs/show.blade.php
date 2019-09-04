@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Data Warung
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('data_warungs.show_fields')
                    <a href="{!! route('datawarung.index') !!}" class="btn btn-default">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
