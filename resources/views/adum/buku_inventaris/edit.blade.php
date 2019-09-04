@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1>Buku Inventaris Desa</h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                {!! Form::model($data, ['method' => 'PATCH','url' => ['adum/inventaris', $data->abi_id],'role' => 'form']) !!}
                    <div class="form-group col-sm-4">
                        {!! Form::label('abi_nomor_urut', 'Nomor') !!}
                        {!! Form::number('abi_nomor_urut', null, ['class' => 'form-control','required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abi_jenis_inventaris', 'Jenis Invetaris/Barang') !!}
                        {!! Form::text('abi_jenis_inventaris', null, ['class' => 'form-control','required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abi_dibeli_sendiri', 'Jumlah Dibeli Sendiri') !!}
                        {!! Form::number('abi_dibeli_sendiri', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abi_bantuan_pemerintah', 'Jumlah Bantuan Pemerintah') !!}
                        {!! Form::number('abi_bantuan_pemerintah', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abi_bantuan_provinsi', 'Jumlah Bantuan Provinsi') !!}
                        {!! Form::number('abi_bantuan_provinsi', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abi_bantuan_kabkota', 'Jumlah Bantuan Kab/Kota') !!}
                        {!! Form::number('abi_bantuan_kabkota', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abi_sumbangan', 'Jumlah dari Sumbangan') !!}
                        {!! Form::number('abi_sumbangan', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abi_awal_baik', 'Jumlah Kondisi Baik di Awal Tahun') !!}
                        {!! Form::number('abi_awal_baik', null, ['class' => 'form-control']) !!}
                    </div>                    
                    <div class="form-group col-sm-4">
                        {!! Form::label('abi_awal_rusak', 'Jumlah Kondisi Rusak di Awal Tahun') !!}
                        {!! Form::number('abi_awal_rusak', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abi_hapus_rusak', 'Jumlah dihapus Karena Rusak') !!}
                        {!! Form::number('abi_hapus_rusak', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abi_hapus_dijual', 'Jumlah dihapus Karena Dijual') !!}
                        {!! Form::number('abi_hapus_dijual', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abi_hapus_disumbangkan', 'Jumlah dihapus Karena Disumbangkan') !!}
                        {!! Form::number('abi_hapus_disumbangkan', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abi_tanggal_hapus', 'Tanggal Penghapusan') !!}
                        {!! Form::date('abi_tanggal_hapus', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abi_akhir_baik', 'Jumlah Kondisi Baik di Akhir Tahun') !!}
                        {!! Form::number('abi_akhir_baik', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abi_akhir_rusak', 'Jumlah Kondisi Baik di Akhir Tahun') !!}
                        {!! Form::number('abi_akhir_rusak', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('ket', 'Keterangan') !!}
                        {!! Form::textarea('ket', null, ['class' => 'form-control', 'rows' => 4, 'required' => 'required']) !!}
                    </div>

                    <!-- Submit Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                        <a href="{!! route('aduminventaris') !!}" class="btn btn-default">Cancel</a>
                    </div>
                {!! Form::close() !!}
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
