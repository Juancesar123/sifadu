@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        {{ __('Edit Daftar Nama Kartu Keluarga') }}
    </h1>
</section>
<div class="content">
    {{-- @include('adminlte-templates::common.errors') --}}
    <div class="box box-primary">

        <div class="box-body">
            <div class="row">
                <form action="{{ route('detailkk.update', $data->nomor_surat) }}" method="POST" role="form">
                    <input name="_method" type="hidden" value="PUT">
                    <input type="hidden" name="nomor_surat" value="{{ $data->nomor_surat }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class=""> <!-- table-responsive -->
                                <table class="table table-hover v-center table-striped" id='datapenduduk'>
                                    <thead>
                                        <tr>
                                            <th class='text-center'>Nama Anggota Keluarga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count(array('nama_lengkap')))
                                            @foreach (array('nama_lengkap') as $key => $val)
                                            <?php 
                                            $statusNama = old('status.'.$key);
                                            $readOnly = '';
                                            $buttonDisable = '';
                                            if ($statusNama == '0' ) {
                                                $readOnly = 'readonly="readonly"';
                                                $buttonDisable = 'disabled="disabled"';
                                            }
          
                                        ?>
                                                <tr>
                                                    <td width="75%">
                                                        <div class="form-group @error($key->nama_lengkap) is-invalid @enderror @error($key->nik) is-invalid @enderror" style="margin-bottom: 5px;">
                                                            <input type="text" name="nama_lengkap[]" class="datapenduduk form-control input-ref input-sm" {{ $readOnly }} placeholder="Nama Lengkap" value="{{ old('nama_lengkap.'.$key) }}" autocomplete="off"> <!-- required="required" -->
                                                        </div>
                                                        <input type="hidden" name="nik[]" class="nik" value="{{ old('nik.'.$key) }}">
                                                        <input type="hidden" name="id_form_pengajuan_kk[]" value="{{ old('id_form_pengajuan_kk.'.$key) }}">
                                                    </td>
                                                    <td style="padding-left: 0px;" class="text-center">
                                                        <div style="margin-top: 5px;">
                                                            <button type="button" data-status="{{ $statusNama }}" class="btn red icon btn-danger btn-sm" disabled="disabled">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                            <button type="button" class="btn blue icon btn-primary btn-sm">
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                        @forelse ($data->detailKK as $datapenduduk)
                                        <?php 
                                            $statusNama = $datapenduduk->status;
                                            $readOnly = '';
                                            $buttonDisable = '';
                                            if ($statusNama == '1' ) {
                                                $readOnly = 'readonly="readonly"';
                                            }
    
                                        ?>
                                        <tr>
                                            <td width="75%">
                                                <div class="form-group @error($key->nama_lengkap) is-invalid @enderror @error($key->nik) is-invalid @enderror" style="margin-bottom: 5px;">
                                                    <input type="text" name="nama_lengkap[]" class="datapenduduk form-control input-ref input-sm" {{ $readOnly }} placeholder="Nama Lengkap" value="{{ old('nama_lengkap.'.$key) }}" autocomplete="off"> <!-- required="required" -->
                                                </div>
                                                <input type="hidden" name="nik[]" class="nik" value="{{ old('nik.'.$key) }}">
                                                <input type="hidden" name="id_form_pengajuan_kk[]" value="{{ old('id_form_pengajuan_kk.'.$key) }}">
                                            </td>
                                            <td style="padding-left: 0px;" class="text-center">
                                                <div style="margin-top: 5px;">
                                                    <button type="button" data-status="{{ $statusNama }}" class="btn red icon btn-danger btn-sm" disabled="disabled">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                    <button type="button" class="btn blue icon btn-primary btn-sm">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                    <tr>
                                        <td width="75%">
                                            <div class="form-group" style="margin-bottom: 5px;">
                                                <input type="text" name="nama_lengkap[]" class="datapenduduk form-control input-ref input-sm" placeholder="Nama Lengkap"> <!-- required="required" -->
                                            </div>
                                            <input type="hidden" name="nik[]" class="nik">
                                         </td>
                                        <td style="padding-left: 0px;" class="text-center">
                                           
                                            <div style="margin-top: 5px;">
                                                <button type="button" class="btn red icon btn-danger btn-sm">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                                <button type="button" class="btn blue icon btn-primary btn-sm">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            <a href="{{ route('formpengajuankk.show', $data->id) }}" class="btn btn-danger btn-sm">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('detailkks.asset')

@endsection