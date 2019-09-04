@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            SD/MI
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($sd, ['route' => ['sd.update', $sd->id], 'method' => 'patch']) !!}

                        @include('sd.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
