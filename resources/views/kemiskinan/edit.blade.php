@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Kemiskinan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($kemiskinan, ['route' => ['kemiskinan.update', $kemiskinan->id], 'method' => 'patch']) !!}

                        @include('kemiskinan.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
