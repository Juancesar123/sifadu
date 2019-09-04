@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Form Pengajuan KK
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <center>
                            <h3>Daftar List Nama Kartu Keluarga</h3>
                        </center>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>NIK/KTP</th>
                                        <th>Nama</th>
                                        <th>No Surat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse( $data->detailkk as $item)
                                        <tr>
                                            <td>{{ $item->nik }}</td>
                                            <td>{{ $item->nama_lengkap }}</td>
                                            <td>{{ $item->nomor_surat }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="3"><a href="{{ route('detailkk.edit', $data->nomor_surat) }}" style="text-decoration: none;"><i class="fa fa-plus"></i>Tambah Nama di KK</a></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('detailkk.edit', $data->nomor_surat) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil-square-o"></i>
                        Edit Nama Kepala Keluarga <strong>{{ isset($data->datapenduduk) && $data->datapenduduk != null ? $data->datapenduduk->nama_lengkap : '-' }}</strong>
                        </a>
                        <a href="{!! route('formpengajuankk.index') !!}" class="btn btn-default">{{__('Back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
