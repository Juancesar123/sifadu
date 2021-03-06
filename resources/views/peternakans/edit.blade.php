@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Peternakan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($peternakan, ['route' => ['peternakans.update', $peternakan->id], 'method' => 'patch']) !!}

                        @include('peternakans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection