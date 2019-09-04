@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Agenda BPD
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($agendabpd, ['route' => ['agendabpds.update', $agendabpd->id], 'method' => 'patch']) !!}

                        @include('agendabpds.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection