@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Jenispekerjaan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($jenispekerjaan, ['route' => ['jenispekerjaans.update', $jenispekerjaan->id], 'method' => 'patch']) !!}

                        @include('jenispekerjaans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection