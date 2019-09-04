@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Perkebunan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($perkebunan, ['route' => ['perkebunans.update', $perkebunan->id], 'method' => 'patch']) !!}

                        @include('perkebunans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection