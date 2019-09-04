@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
                Surat Keterangan Desa
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('suratketerangandesas.show_fields')
                    <a href="{!! route('suratketerangandesas.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
