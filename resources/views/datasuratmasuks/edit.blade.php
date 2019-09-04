@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
                Data Surat Masuk
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($datasuratmasuk, ['route' => ['datasuratmasuks.update', $datasuratmasuk->id], 'method' => 'patch']) !!}

                        @include('datasuratmasuks.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection