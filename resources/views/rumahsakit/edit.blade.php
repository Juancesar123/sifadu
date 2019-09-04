@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Rumah Sakit
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($rumahsakit, ['route' => ['rumahsakit.update', $rumahsakit->id], 'method' => 'patch']) !!}

                        @include('rumahsakit.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
