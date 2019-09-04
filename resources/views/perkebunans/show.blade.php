@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Perkebunan
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('perkebunans.show_fields')
                    <a href="{!! route('perkebunans.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
