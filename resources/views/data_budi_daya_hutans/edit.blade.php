@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Data Budi Daya Hutan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dataBudiDayaHutan, ['route' => ['dataBudiDayaHutans.update', $dataBudiDayaHutan->id], 'method' => 'patch']) !!}

                        @include('data_budi_daya_hutans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection