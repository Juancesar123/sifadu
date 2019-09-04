@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1>Detail</h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Lembaran Desa & Berita Desa</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="">Jenis Peraturan</label>
                    <p>{{ $data->perdes->perdes_nama }}</p>
                </div>
                <div class="form-group">
                    <label for="">Tentang</label>
                    <p>{{ $data->lember_tentang }}</p>
                </div>
                <div class="form-group">
                    <label for="">Tanggal Ditetapkan</label>
                    <p>{{ $tanggal }}</p>
                </div>
                <div class="form-group">
                    <label for="">Nomor Ditetapkan</label>
                    <p>{{ $data->lember_nomor }}</p>
                </div>
                <div class="form-group">
                    <label for="">Tanggal Diundangkan</label>
                    <p>{{ $tanggal_uu }}</p>
                </div>
                <div class="form-group">
                    <label for="">Keterangan</label>
                    <p>{{ $data->lember_keterangan }}</p>
                </div>                                
            </div>
            <div class="box-footer">
                <a href="{!! route('lember') !!}" class="btn btn-default">Kembali</a>
            </div>
        </div>
    </div>
@endsection