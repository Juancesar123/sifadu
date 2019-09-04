@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1>Buku Keputusan Desa</h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                {!! Form::model($data, ['method' => 'PATCH','url' => ['adum/keputusan', $data->abk_id],'role' => 'form']) !!}
                    <div class="form-group col-sm-4">
                        {!! Form::label('abk_nomor_urut', 'Nomor') !!}
                        {!! Form::number('abk_nomor_urut',null, ['class' => 'form-control','required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abk_tentang', 'Tentang') !!}
                        {!! Form::text('abk_tentang',null, ['class' => 'form-control','required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abk_nomor_tanggal', 'Tanggal Keputusan') !!}
                        {!! Form::date('abk_nomor_tanggal',null, ['class' => 'form-control','required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abk_uraian_singkat', 'Uraian Singkat') !!}
                        {!! Form::textarea('abk_uraian_singkat',null, ['class' => 'form-control', 'rows' => 4,'required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abk_keterangan', 'Keterangan') !!}
                        {!! Form::textarea('abk_keterangan',null, ['class' => 'form-control', 'rows' => 4]) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abk_nomor_tanggal_lapor', 'Tanggal Keputusan') !!}
                        {!! Form::date('abk_nomor_tanggal_lapor',null, ['class' => 'form-control','required' => 'required']) !!}
                    </div>

                    <!-- Submit Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                        <a href="{!! route('adumkeputusan') !!}" class="btn btn-default">Cancel</a>
                    </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
