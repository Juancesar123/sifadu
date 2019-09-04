@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Penyakit Menular
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($penyakitmenular, ['route' => ['penyakitmenular.update', $penyakitmenular->id], 'method' => 'patch']) !!}

                        @include('penyakitmenular.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
