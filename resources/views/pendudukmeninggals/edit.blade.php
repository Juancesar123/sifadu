@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pendudukmeninggal
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pendudukmeninggal, ['route' => ['pendudukmeninggals.update', $pendudukmeninggal->id], 'method' => 'patch']) !!}

                        @include('pendudukmeninggals.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection