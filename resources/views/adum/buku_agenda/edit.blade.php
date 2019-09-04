@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1>Buku Agenda Desa</h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($data, ['method' => 'PATCH','url' => ['adum/agenda', $data->aba_id],'role' => 'form']) !!}
                    <div class="form-group col-sm-4">
                        {!! Form::label('aba_jenis_surat', 'Jenis Surat') !!}
                        {!! Form::select('aba_jenis_surat', $jenis, $data->aba_jenis_surat, ['placeholder' => 'Pilih', 'id' => 'jenis', 'class' => 'form-control', 'onchange' => 'jenisSurat();', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('aba_tanggal', 'Tanggal') !!}
                        {!! Form::date('aba_tanggal', $data->aba_tanggal, ['class' => 'form-control','required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('aba_nomor_surat', 'Nomor Surat') !!}
                        {!! Form::text('aba_nomor_surat', $data->aba_nomor_surat, ['class' => 'form-control','required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('aba_tanggal_surat', 'Tanggal Surat') !!}
                        {!! Form::date('aba_tanggal_surat', $data->aba_tanggal_surat, ['class' => 'form-control','required' => 'required']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('aba_pengirim_surat', 'Pengirim Surat') !!}
                        {!! Form::text('aba_pengirim_surat', $data->aba_pengirim_surat, ['class' => 'form-control pengirim', 'readonly' => 'readonly']) !!}
                    </div>
                    <div class="form-group col-sm-4">
                        {!! Form::label('aba_tujuan_surat', 'Penerima Surat') !!}
                        {!! Form::text('aba_tujuan_surat', $data->aba_tujuan_surat, ['class' => 'form-control penerima', 'readonly' => 'readonly']) !!}
                    </div>
                    <div class="form-group col-sm-12">
                        {!! Form::label('aba_isi_surat', 'Isi Surat') !!}
                        {!! Form::textarea('aba_isi_surat', $data->aba_isi_surat, ['class' => 'form-control', 'rows' => 4]) !!}
                    </div>
                    <div class="form-group col-sm-12">
                        {!! Form::label('aba_keterangan_surat', 'Keterangan Surat') !!}
                        {!! Form::textarea('aba_keterangan_surat', $data->aba_keterangan_surat, ['class' => 'form-control', 'rows' => 4]) !!}
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
@push('script')
    <script>
        $(function() {
            $('#jenis').trigger('change');
            $('#jenis').select2({placeholder:'Pilih', width: '100%'});
        });

        function jenisSurat()
        {
            let val = $('#jenis').val();
            let val_pengirim = "{{ $data->aba_pengirim_surat }}";
            let val_tujuan = "{{ $data->aba_tujuan_surat }}";

            if(val == 1) {
                $('.penerima').prop('value', '');
                $('.pengirim').prop('value', val_pengirim);
                $('.pengirim').prop('readonly', false);
                $('.penerima').prop('readonly', true);
                $('.pengirim').prop('required', true);
                $('.penerima').prop('required', false);
            } else if(val == 2) {
                $('.penerima').prop('value', val_tujuan);
                $('.pengirim').prop('value', '');
                $('.pengirim').prop('readonly', true);
                $('.penerima').prop('readonly', false);
                $('.pengirim').prop('required', false);
                $('.penerima').prop('required', true);
            } else {
                $('.pengirim').prop('value', '');
                $('.penerima').prop('value', '');
                $('.pengirim').prop('readonly', true);
                $('.penerima').prop('readonly', true);
                $('.pengirim').prop('required', false);
                $('.penerima').prop('required', false);
            }
        }
    </script>
@endpush
