@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Mushola
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($mushola, ['route' => ['mushola.update', $mushola->id], 'method' => 'patch']) !!}

                        @include('mushola.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
