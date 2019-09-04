@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Perguruan Tinggi
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pt, ['route' => ['pt.update', $pt->id], 'method' => 'patch']) !!}

                        @include('pt.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
