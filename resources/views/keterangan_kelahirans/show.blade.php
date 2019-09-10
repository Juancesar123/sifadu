@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Keterangan Kelahiran
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('keterangan_kelahirans.show_fields')
                    <a href="{!! route('keterangan-kelahiran.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection