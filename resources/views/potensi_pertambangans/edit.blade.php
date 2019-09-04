@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Potensi Pertambangan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($potensiPertambangan, ['route' => ['potensiPertambangans.update', $potensiPertambangan->id], 'method' => 'patch']) !!}

                        @include('potensi_pertambangans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection