@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Penduduk Pindah
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pendudukpindah, ['route' => ['pendudukpindahs.update', $pendudukpindah->id], 'method' => 'patch']) !!}

                        @include('pendudukpindahs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection