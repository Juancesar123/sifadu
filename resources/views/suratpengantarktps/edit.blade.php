@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Surat Pengantar KTP
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($suratpengantarktp, ['route' => ['suratpengantarktps.update', $suratpengantarktp->id], 'method' => 'patch']) !!}

                        @include('suratpengantarktps.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection