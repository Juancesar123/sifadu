@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
                Status Kawin
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($parameterstatuskawin, ['route' => ['parameterstatuskawins.update', $parameterstatuskawin->id], 'method' => 'patch']) !!}

                        @include('parameterstatuskawins.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection