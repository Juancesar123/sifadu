@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
           {{ __('Form Pengajuan KK') }}
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($formpengajuankk, ['route' => ['formpengajuankk.update', $formpengajuankk->id], 'method' => 'patch']) !!}

                        @include('formpengajuankks.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection