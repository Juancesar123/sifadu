@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pajak Tanah
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pajaktanah, ['route' => ['pajaktanahs.update', $pajaktanah->id], 'method' => 'patch']) !!}

                        @include('pajaktanahs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection