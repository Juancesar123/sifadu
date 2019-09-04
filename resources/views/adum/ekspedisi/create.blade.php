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
                {!! Form::open(['route' => 'ekspedisi.store']) !!}
                    <div class="form-group col-sm-6">
                        {!! Form::label('eksped_tanggal', 'Tanggal Pengiriman') !!}
                        {!! Form::date('eksped_tanggal', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::label('eksped_tanggal_surat', 'Tanggal Surat') !!}
                        {!! Form::date('eksped_tanggal_surat', null, ['class' => 'form-control','required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::label('eksped_nomor_surat', 'Nomor Surat') !!}
                        {!! Form::text('eksped_nomor_surat', null, ['class' => 'form-control','required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::label('eksped_penerima', 'Ditujukan Kepada') !!}
                        {!! Form::text('eksped_penerima', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::label('eksped_isi', 'Isi Singkat') !!}
                        {!! Form::textarea('eksped_isi', null, ['class' => 'form-control', 'rows' => 4, 'required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::label('eksped_keterangan', 'Keterangan') !!}
                        {!! Form::textarea('eksped_keterangan', null, ['class' => 'form-control', 'rows' => 4]) !!}
                    </div>
                    <!-- Submit Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                        <a href="{!! route('adumagenda') !!}" class="btn btn-default">Cancel</a>
                    </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
