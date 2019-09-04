@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Kegiatan BPD
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($kegiatanbpd, ['route' => ['kegiatanbpds.update', $kegiatanbpd->id], 'method' => 'patch']) !!}

                        @include('kegiatanbpds.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection