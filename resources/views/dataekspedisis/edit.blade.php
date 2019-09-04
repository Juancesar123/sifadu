@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Data Ekspedisi
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dataekspedisi, ['route' => ['dataekspedisis.update', $dataekspedisi->id], 'method' => 'patch']) !!}

                        @include('dataekspedisis.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection