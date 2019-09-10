@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Keterangan Penghasilan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($keteranganPenghasilan, ['route' => ['keteranganPenghasilans.update', $keteranganPenghasilan->id], 'method' => 'patch']) !!}

                        @include('keterangan_penghasilans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection