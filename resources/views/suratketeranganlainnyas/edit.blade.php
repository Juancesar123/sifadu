@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Surat Keterangan Lainnya
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($suratketeranganlainnya, ['route' => ['suratketeranganlainnyas.update', $suratketeranganlainnya->id], 'method' => 'patch']) !!}

                        @include('suratketeranganlainnyas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection