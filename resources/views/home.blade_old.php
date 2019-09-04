@extends('layouts.app')
<style>
    .profil-icon-img {
        margin: 0 auto;
        width: 100px;
        padding: 3px;
    }
</style>
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="col-md-8">
            <div class="row">
                <img class="img-responsive" src="{{ asset('img/banner.jpeg') }}">
            </div>
            <section class="content">
                <div class="row">
                    <div class="col-lg-4 col-xs-4">
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>10</h3>                    
                                <p>Pesan Masuk</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-email"></i>
                            </div>
                            <a href="#" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xs-4">
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>12</h3>
                                <p>Layanan Online</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xs-4">
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>50</h3>
                                <p>Pengaduan Online</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 15px">
                    <div class="col-lg-4 col-xs-4">
                        <div class="image">
                            <a href="{{ url('suratketerangandesas') }}"><img class="profil-icon-img img-responsive" src="{{ asset('img/clipboard.png') }}" width="90px"></a>
                            <h3 class="profile-username text-center" style="font-size: 16px">Administrasi Umum Desa</h3>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xs-4">
                        <div class="image">
                            <a href="{{ url('agendabpds') }}"><img class="profil-icon-img img-responsive" src="{{ asset('img/book.png') }}" width="90px"></a>
                            <h3 class="profile-username text-center" style="font-size: 16px">Buku Agenda Desa</h3>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xs-4">
                        <div class="image">
                            <a href="{{ url('petadesa') }}">
                                <img class="profil-icon-img img-responsive" src="{{ asset('img/map.png') }}" width="90px">
                            </a>
                            <h3 class="profile-username text-center" style="font-size: 16px">Gis Desa</h3>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 20px">
                    <div class="col-lg-4 col-xs-4">
                        <div class="image">
                            <a href="{{ url('pengangguran') }}">
                                <img class="profil-icon-img img-responsive" src="{{ asset('img/analytics.png') }}" width="90px">
                            </a>
                            <h3 class="profile-username text-center" style="font-size: 16px">Data Kemiskinan & Pengangguran</h3>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xs-4">
                        <div class="image">
                            <a href="{{ url('statistik/statistik') }}">
                                <img class="profil-icon-img img-responsive" src="{{ asset('img/statistics.png') }}" width="90px">
                            </a>
                            <h3 class="profile-username text-center" style="font-size: 16px">Statistik</h3>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xs-4">
                        <div class="image">
                            <a href="{{ url('home') }}">
                                <img class="profil-icon-img img-responsive" src="{{ asset('img/dashboard.png') }}" width="90px">
                            </a>
                            <h3 class="profile-username text-center" style="font-size: 16px">Dashboard Website</h3>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-4" style="background-color: #fff;min-height:782px">
            <div class="row">
                <div class="col-md-12">
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="{{asset('img/2191f-lambang_kab_sukabumi.svg_-2-e1532000502726-232x300.png')}}" alt="User Image">
                        </div>
                        <div class="pull-left info" style="color: #ffe003">
                            <strong>PEMERINTAH KABUPATEN SUKABUMI</strong>
                            <p style="font-size: 13px;margin-top: 5px;">KEC. {{ ($desa) ? strtoupper($desa->profil_kecamatan) : '' }}, KAB. SUKABUMI</p> 
                        </div>
                    </div>
                    <div class="well no-shadow text-muted" style="float: left; padding: 10px 10px;width: 100%">
                        <h4>
                            <strong>Profil Wilayah</strong>
                            <a class="btn btn-xs btn-default pull-right" href="#" data-toggle="modal" data-target="#edit-profil-desa"><i class="fa fa-pencil"></i></a>
                        </h4>
                        <table class="table table-condensed" style="font-size: 13px;">
                            <tr>
                                <th style="width: 125px;">Nama Desa</th>
                                <td>: {{ ($desa) ? $desa->profil_nama : '' }}</td>
                            </tr>
                            <tr>
                                <th>Kecamatan</th>
                                <td>: {{ ($desa) ? $desa->profil_kecamatan : '' }}</td>
                            </tr>
                            <tr>
                                <th>Kota</th>
                                <td>: {{ ($desa) ? $desa->profil_kabupaten : '' }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>: {{ ($desa) ? $desa->profil_alamat : '' }}</td>
                            </tr>
                            <tr>
                                <th>Luas Wilayah</th>
                                <td>: {{ ($desa) ? $desa->profil_luas : '' }} Ha</td>
                            </tr>
                            <tr>
                                <th>Jumlah Penduduk</th>
                                <td>: {{ ($jumlahPenduduk) ? $jumlahPenduduk : 0 }}</td>
                            </tr>
                            <tr>
                                <th>Batas Wilayah</th>
                                <td></td>
                            </tr>
                            @if (!empty($batas))
                                @foreach ($batas as $key => $row)
                                    <tr>
                                        <th>&nbsp;&nbsp;&nbsp; - {{ ucfirst($key) }}</th>
                                        <td>: {{ $row }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31689.12058713!2d106.77043686836176!3d-6.873815182092031!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6833d8d15145b9%3A0x5e652adbaf5075a3!2sCisarua%2C+Nagrak%2C+Sukabumi%2C+West+Java!5e0!3m2!1sen!2sid!4v1560603391976!5m2!1sen!2sid" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="edit-profil-desa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Edit Profil Desa</h4>
                </div>
                <form action="{{ url('home/desa/1') }}" method="post" class="form-horizontal">
                    <input type="hidden" name="_method" value="put" />
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="">Kelurahan</label>
                                <input type="text" name="profil_nama" class="form-control" value="{{ ($desa) ? $desa->profil_nama : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="">Kecamatan</label>
                                <input type="text" name="profil_kecamatan" class="form-control" value="{{ ($desa) ? $desa->profil_kecamatan : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="">Kabupaten</label>
                                <input type="text" name="profil_kabupaten" class="form-control" value="{{ ($desa) ? $desa->profil_kabupaten : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="">Alamat</label>
                                <input type="text" name="profil_alamat" class="form-control" value="{{ ($desa) ? $desa->profil_alamat : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="">Kode Pos</label>
                                <input type="text" name="profil_kode_pos" class="form-control" value="{{ ($desa) ? $desa->profil_kode_pos : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="">Luas Wilayah</label>
                                <input type="text" name="profil_luas" class="form-control" value="{{ ($desa) ? $desa->profil_luas : '' }}">
                            </div>
                        </div>
                        <div class="form-group">
                            @foreach ($batas as $key => $row)
                                <div class="col-md-6">
                                    <label for="">Batas {{ $key }}</label>
                                    <input type="text" name="profil_batas[{{ $key }}]" class="form-control" value="{{ $row }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-default">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
