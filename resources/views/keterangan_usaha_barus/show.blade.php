@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Keterangan Usaha Baru
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('keterangan_usaha_barus.show_fields')
                    <a href="{!! route('keteranganUsahaBarus.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
