@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Rencana Pembangunan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($rencanapembangunan, ['route' => ['rencanapembangunans.update', $rencanapembangunan->id], 'method' => 'patch']) !!}

                        @include('rencanapembangunans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection