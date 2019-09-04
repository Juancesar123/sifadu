@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Data Ukm
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dataUkm, ['route' => ['dataUkms.update', $dataUkm->id], 'method' => 'patch']) !!}

                        @include('data_ukms.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection