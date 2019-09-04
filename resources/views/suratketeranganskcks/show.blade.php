@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">
            Surat Keterangan SKCK
        </h1>
        <h1 class="pull-right">
            <a href="{!! route('suratketeranganskcks.index') !!}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</a>
            <button onClick="MyWindow=window.open('{{ route('suratketeranganskcks.print', $suratketeranganskck->id) }}','MyWindow',width=215,height=330); return false;" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</button>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('suratketeranganskcks.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection
