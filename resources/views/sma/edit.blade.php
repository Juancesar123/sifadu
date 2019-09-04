@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            SMA
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($sma, ['route' => ['sma.update', $sma->id], 'method' => 'patch']) !!}

                        @include('sma.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
