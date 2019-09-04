@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1>Lembaran Desa & Berita Desa</h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($data, ['method' => 'PATCH','url' => ['adum/lember', $data->lember_id],'role' => 'form']) !!}
                    <div class="form-group col-sm-6">
                        {!! Form::label('lember_perdes_id', 'Jenis Peraturan') !!}
                        {!! Form::select('lember_perdes_id', $perdes, $data->lember_perdes_id, ['placeholder' => 'Pilih', 'class' => 'form-control jenis', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::label('lember_tentang', 'Tentang') !!}
                        {!! Form::text('lember_tentang', $data->lember_tentang, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::label('lember_nomor', 'Nomor Ditetapkan') !!}
                        {!! Form::text('lember_nomor', $data->lember_nomor, ['class' => 'form-control','required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::label('lember_tanggal', 'Tanggal Ditetapkan') !!}
                        {!! Form::date('lember_tanggal', isset($data->lember_tanggal) ? $data->lember_tanggal : null, ['class' => 'form-control','required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::label('lember_nomor_uu', 'Nomor Diundangkan') !!}
                        {!! Form::text('lember_nomor_uu', $data->lember_nomor_uu, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::label('lember_tanggal_uu', 'Tanggal Diundangkan') !!}
                        {!! Form::date('lember_tanggal_uu', isset($data->lember_tanggal_uu) ? $data->lember_tanggal_uu : null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-12">
                        {!! Form::label('lember_keterangan', 'Keterangan') !!}
                        {!! Form::textarea('lember_keterangan', $data->lember_keterangan, ['class' => 'form-control', 'rows' => 4]) !!}
                    </div>
                    <!-- Submit Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                        <a href="{!! route('lember') !!}" class="btn btn-default">Batalkan</a>
                    </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(function() {
            $('.jenis').select2({placeholder:'Pilih', width: '100%'});
        });
    </script>
@endpush
