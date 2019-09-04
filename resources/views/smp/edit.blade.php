@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            SMP
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($smp, ['route' => ['smp.update', $smp->id], 'method' => 'patch']) !!}

                        @include('smp.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
