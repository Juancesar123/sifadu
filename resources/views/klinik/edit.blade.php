@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            klinik
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($klinik, ['route' => ['klinik.update', $klinik->id], 'method' => 'patch']) !!}

                        @include('klinik.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
