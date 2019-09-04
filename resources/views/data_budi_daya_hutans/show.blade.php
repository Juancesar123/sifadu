@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Data Budi Daya Hutan
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('data_budi_daya_hutans.show_fields')
                    <a href="{!! route('dataBudiDayaHutans.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
