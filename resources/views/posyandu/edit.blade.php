@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Posyandu
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($posyandu, ['route' => ['posyandu.update', $posyandu->id], 'method' => 'patch']) !!}

                        @include('posyandu.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
