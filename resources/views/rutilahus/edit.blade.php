@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Rutilahu
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($rutilahu, ['route' => ['rutilahus.update', $rutilahu->id], 'method' => 'patch']) !!}

                        @include('rutilahus.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection