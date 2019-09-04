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
                {!! Form::model($data, ['method' => 'PATCH','url' => ['adum/peraturan', $data->abp_id],'role' => 'form']) !!}                
                    <div class="form-group col-sm-4">
                        {!! Form::label('abp_nomor_urut', 'Nomor') !!}
                        {!! Form::number('abp_nomor_urut', null, ['class' => 'form-control','required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abp_jenis_peraturan', 'Jenis Peraturan') !!}
                        {!! Form::select('abp_jenis_peraturan', $jenis, null, ['placeholder' => 'Pilih', 'id' => 'jenis', 'class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abp_tentang', 'Tentang') !!}
                        {!! Form::text('abp_tentang', null, ['class' => 'form-control','required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abp_tanggal_tetap', 'Tanggal Ditetapkan') !!}
                        {!! Form::date('abp_tanggal_tetap', null, ['class' => 'form-control','required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abp_uraian_singkat', 'Uraian Singkat') !!}
                        {!! Form::textarea('abp_uraian_singkat', null, ['class' => 'form-control', 'rows' => 4,'required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abp_tanggal_sepakat', 'Tanggal Disepakati') !!}
                        {!! Form::date('abp_tanggal_sepakat', null, ['class' => 'form-control','required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abp_tanggal_lapor', 'Tanggal Dilaporkan') !!}
                        {!! Form::date('abp_tanggal_lapor', null, ['class' => 'form-control','required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abp_tanggal_undang_lembaran', 'Tanggal Diundangkan dalam Lembaran Desa') !!}
                        {!! Form::date('abp_tanggal_undang_lembaran', null, ['class' => 'form-control','required' => 'required']) !!}
                    </div>                    
                    <div class="form-group col-sm-4">
                        {!! Form::label('abp_tanggal_undang_berita', 'Tanggal Diundangkan dalam Berita Desa') !!}
                        {!! Form::date('abp_tanggal_undang_berita', null, ['class' => 'form-control','required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abp_keterangan', 'Keterangan') !!}
                        {!! Form::textarea('abp_keterangan', null, ['class' => 'form-control', 'rows' => 4]) !!}
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
    </div>
@endsection
