@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Penduduk Miskin
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pendudukMiskin, ['route' => ['kemiskinan.update', $pendudukMiskin->id], 'method' => 'patch']) !!}

                        @include('penduduk_miskins.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection