@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Masjid
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($masjid, ['route' => ['masjid.update', $masjid->id], 'method' => 'patch']) !!}

                        @include('masjid.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
