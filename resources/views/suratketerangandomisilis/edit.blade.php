@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
                Surat Keterangan Domisili
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($suratketerangandomisili, ['route' => ['suratketerangandomisilis.update', $suratketerangandomisili->id], 'method' => 'patch']) !!}

                        @include('suratketerangandomisilis.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection