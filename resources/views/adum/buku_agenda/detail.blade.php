@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1>Detail</h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Buku Agenda Desa</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="">Jenis Surat</label>
                    <p>{!! $jenis !!}</p>
                </div>
                <div class="form-group">
                    <label for="">Tanggal</label>
                    <p>{{ $tanggal }}</p>
                </div>
                <div class="form-group">
                    <label for="">Nomor Surat</label>
                    <p>{{ $data->aba_nomor_surat }}</p>
                </div>
                <div class="form-group">
                    <label for="">Tanggal Surat</label>
                    <p>{{ $tanggal_surat }}</p>
                </div>
                @if ($data->aba_jenis_surat == 1)
                    <div class="form-group">
                        <label for="">Pengirim</label>
                        <p>{{ $data->aba_pengirim_surat }}</p>
                    </div> 
                @else
                    <div class="form-group">
                        <label for="">Penerima</label>
                        <p>{{ $data->aba_tujuan_surat }}</p>
                    </div>            
                @endif
                <div class="form-group">
                    <label for="">Isi Surat</label>
                    <p>{{ $data->aba_isi_surat }}</p>
                </div>                
                <div class="form-group">
                    <label for="">Keterangan Surat</label>
                    <p>{{ $data->aba_keterangan_surat }}</p>
                </div>                
            </div>
            <div class="box-footer">
                <a href="{!! route('adumagenda') !!}" class="btn btn-default">Kembali</a>
            </div>
        </div>
    </div>
@endsection