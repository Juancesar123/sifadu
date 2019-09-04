@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Surat Pengantar KK
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($suratpengantarkk, ['route' => ['suratpengantarkks.update', $suratpengantarkk->id], 'method' => 'patch']) !!}

                        @include('suratpengantarkks.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection