@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Dusun
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dusun, ['route' => ['dusuns.update', $dusun->id], 'method' => 'patch']) !!}

                        @include('dusuns.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection