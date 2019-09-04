@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
                Surat Keterangan Desa
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($suratketerangandesa, ['route' => ['suratketerangandesas.update', $suratketerangandesa->id], 'method' => 'patch']) !!}

                        @include('suratketerangandesas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection