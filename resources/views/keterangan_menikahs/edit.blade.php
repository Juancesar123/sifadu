@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Keterangan Menikah
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($keteranganMenikah, ['route' => ['keteranganMenikahs.update', $keteranganMenikah->id], 'method' => 'patch']) !!}

                        @include('keterangan_menikahs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection