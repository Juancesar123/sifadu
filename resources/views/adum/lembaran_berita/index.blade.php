@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1 class="pull-left">Lembaran Desa dan Berita Desa</h1>
        <h1 class="pull-right">
           <a class="btn btn-sm btn-primary" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('lember.create') !!}"><i class="fa fa-plus"></i> Tambah</a>
           <a class="btn btn-sm btn-info" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('lember.printword') !!}"><i class="fa fa-file-word-o" ></i> Cetak Word</a>
           <a class="btn btn-sm btn-danger" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('lember.printpdf') !!}"><i class="fa fa-file-pdf-o"></i> Cetak Pdf</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        @include('message')
        <div class="box box-primary">
            <div class="box-body table-responsive">
                @include('adum.lembaran_berita.table')
            </div>
        </div>
        <div class="text-center"></div>
    </div>
@endsection