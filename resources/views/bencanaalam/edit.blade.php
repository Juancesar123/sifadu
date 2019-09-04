@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Bencana Alam
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($bencanaalam, ['route' => ['bencanaalam.update', $bencanaalam->id], 'method' => 'patch']) !!}

                        @include('bencanaalam.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
