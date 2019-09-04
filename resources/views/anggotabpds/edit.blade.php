@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Anggota BPD
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($anggotabpd, ['route' => ['anggotabpds.update', $anggotabpd->id], 'method' => 'patch']) !!}

                        @include('anggotabpds.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection