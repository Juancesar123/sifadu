@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1>Buku Aparat Desa</h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                {!! Form::model($data, ['method' => 'PATCH','url' => ['adum/aparat', $data->abap_id],'role' => 'form']) !!}
                    <div class="form-group col-sm-4">
                        {!! Form::label('abap_nomor_urut', 'Nomor') !!}
                        {!! Form::number('abap_nomor_urut', null, ['class' => 'form-control','required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abap_nama', 'Nama') !!}
                        {!! Form::text('abap_nama', null, ['class' => 'form-control','required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abap_no_aparat', 'Nomor Induk Aparat') !!}
                        {!! Form::number('abap_no_aparat', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abap_no_pegawai', 'Nomor Induk Pegawai') !!}
                        {!! Form::number('abap_no_pegawai', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abap_jenis_kelamin', 'Jenis Kelamin') !!}
                            <select class="form-control" name="abap_jenis_kelamin" required>
                                    <option selected disabled > --- </option>
                                    <option value="L"> Laki-laki </option>
                                    <option value="P"> Perempuan </option>
                                
                            </select>
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abap_ttl_1', 'Tempat Lahir') !!}
                        {!! Form::text('abap_ttl_1', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abap_ttl_2', 'Tanggal Lahir') !!}
                        {!! Form::date('abap_ttl_2', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abap_agama', 'Agama') !!}
                        {!! Form::text('abap_agama', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abap_golongan', 'Pangkat Golongan') !!}
                        {!! Form::text('abap_golongan', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>                    
                    <div class="form-group col-sm-4">
                        {!! Form::label('abap_jabatan', 'Jabatan') !!}
                        {!! Form::text('abap_jabatan', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abap_pendidikan', 'Pendidikan Terakhir') !!}
                        <select class="form-control" name="abap_pendidikan" required>
                            <option selected disabled value="" > --- </option>
                            <option value="SD"> SD </option>
                            <option value="SLTP"> SLTP </option>
                            <option value="SLTA"> SLTA </option>
                            <option value="S-1"> S-1 </option>
                            <option value="S-2"> S-2 </option>
                        </select>
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abap_no_tanggal_pengangkatan', 'Tanggal Pengangkatan') !!}
                        {!! Form::date('abap_no_tanggal_pengangkatan', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abap_no_tanggal_pemberhentian', 'Tanggal Pemberhentian') !!}
                        {!! Form::date('abap_no_tanggal_pemberhentian', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('abap_ket', 'Keterangan') !!}
                        {!! Form::textarea('abap_ket', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Submit Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                        <a href="{!! route('adumaparat') !!}" class="btn btn-default">Cancel</a>
                    </div>
                {!! Form::close() !!}
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
