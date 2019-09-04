@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Data Warung
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($datawarung, ['route' => ['datawarung.update', $datawarung->id], 'method' => 'patch']) !!}

                        @include('data_warungs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
