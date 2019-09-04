@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1>Detail</h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Ekspedisi Desa</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="">Tanggal Dikirimkan</label>
                    <p>{{ $tanggal }}</p>
                </div>
                <div class="form-group">
                    <label for="">Tanggal Surat</label>
                    <p>{{ $tanggal_surat }}</p>
                </div>
                <div class="form-group">
                    <label for="">Nomor Surat</label>
                    <p>{{ $data->eksped_nomor }}</p>
                </div>
                <div class="form-group">
                    <label for="">Penerima</label>
                    <p>{{ $data->eksped_penerima }}</p>
                </div>
                <div class="form-group">
                    <label for="">Isi</label>
                    <p>{{ $data->eksped_isi }}</p>
                </div>                                
                <div class="form-group">
                    <label for="">Keterangan</label>
                    <p>{{ $data->eksped_keterangan }}</p>
                </div>                                
            </div>
            <div class="box-footer">
                <a href="{!! route('ekspedisi') !!}" class="btn btn-default">Kembali</a>
            </div>
        </div>
    </div>
@endsection