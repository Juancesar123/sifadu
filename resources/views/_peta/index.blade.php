@extends('layouts.app')
@section('content')
<section class="content-header">
    <h1>
        GIS DESA
    </h1>
</section>
<div class="content">
    <div class="row">
        <div class="col-lg-6 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3 style="font-size: 30px">Zonasi</h3>
                    <p>Desa</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-list"></i>
                </div>
                <a href="{{ url('customDatas') }}" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-6 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3 style="font-size: 30px">Titik Sarana</h3>
                    <p>Desa</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-list"></i>
                </div>
                <a href="{{ url('markers') }}" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection