@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Perikanan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($perikanan, ['route' => ['perikanans.update', $perikanan->id], 'method' => 'patch']) !!}

                        @include('perikanans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection