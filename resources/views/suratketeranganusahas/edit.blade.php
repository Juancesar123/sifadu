@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Surat Keterangan Usaha
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($suratketeranganusaha, ['route' => ['suratketeranganusahas.update', $suratketeranganusaha->id], 'method' => 'patch']) !!}

                        @include('suratketeranganusahas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection