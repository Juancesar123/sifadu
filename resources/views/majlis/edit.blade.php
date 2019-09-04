@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Majlis Ta'lim
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($majlis, ['route' => ['majlis.update', $majlis->id], 'method' => 'patch']) !!}

                        @include('majlis.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
