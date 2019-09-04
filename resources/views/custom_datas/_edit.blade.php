@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Custom Data
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($customData, ['route' => ['customDatas.update', $customData->id], 'method' => 'patch']) !!}

                        @include('custom_datas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection