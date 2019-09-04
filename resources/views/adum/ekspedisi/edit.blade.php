@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1>Ekspedisi Desa</h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($data, ['method' => 'PATCH','url' => ['adum/ekspedisi', $data->eksped_id],'role' => 'form']) !!}
                    <div class="form-group col-sm-6">
                        {!! Form::label('eksped_tanggal', 'Tanggal Pengiriman') !!}
                        {!! Form::date('eksped_tanggal', isset($data->eksped_tanggal) ? $data->eksped_tanggal : null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::label('eksped_tanggal_surat', 'Tanggal Surat') !!}
                        {!! Form::date('eksped_tanggal_surat', isset($data->eksped_tanggal_surat) ? $data->eksped_tanggal_surat : null, ['class' => 'form-control','required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::label('eksped_nomor_surat', 'Nomor Surat') !!}
                        {!! Form::text('eksped_nomor_surat', $data->eksped_nomor_surat, ['class' => 'form-control','required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::label('eksped_penerima', 'Ditujukan Kepada') !!}
                        {!! Form::text('eksped_penerima', $data->eksped_penerima, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::label('eksped_isi', 'Isi Singkat') !!}
                        {!! Form::textarea('eksped_isi', $data->eksped_isi, ['class' => 'form-control', 'rows' => 4, 'required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::label('eksped_keterangan', 'Keterangan') !!}
                        {!! Form::textarea('eksped_keterangan', $data->eksped_keterangan, ['class' => 'form-control', 'rows' => 4]) !!}
                    </div>
                    <!-- Submit Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                        <a href="{!! route('adumagenda') !!}" class="btn btn-default">Batalkan</a>
                    </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
