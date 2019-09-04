@extends('layouts.app')
@section('content')
<section class="content-header">
    <h1>
        GIS DESA
        <a class="pull-right btn btn-primary pull-right" style="" href="{{url('home')}}">Back</a>
    </h1>
</section>
<div class="content">
    <div class="row">
        <div class="col-lg-6 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3 style="font-size: 30px">Sarana Pra-Sarana</h3>
                    <p>Desa</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-list"></i>
                </div>
                <a href="{{ url('markers') }}" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-6 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3 style="font-size: 30px">Data Sosial</h3>
                    <p>Desa</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-list"></i>
                </div>
                <a href="{{ url('msocials') }}" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3 style="font-size: 30px">Data Ekonomi</h3>
                    <p>Desa</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-list"></i>
                </div>
                <a href="{{ url('mekonomis') }}" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-6 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3 style="font-size: 30px">Infrastruktur</h3>
                    <p>Desa</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-list"></i>
                </div>
                <a href="{{ url('minfrastrukturs') }}" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection