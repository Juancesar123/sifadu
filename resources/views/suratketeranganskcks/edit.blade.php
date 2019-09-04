@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Surat Keterangan SKCK
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($suratketeranganskck, ['route' => ['suratketeranganskcks.update', $suratketeranganskck->id], 'method' => 'patch']) !!}

                        @include('suratketeranganskcks.updatefields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection