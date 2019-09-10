@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Keterangan Kelahiran
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($keteranganKelahiran, ['route' => ['keteranganKelahirans.update', $keteranganKelahiran->id], 'method' => 'patch']) !!}

                        @include('keterangan_kelahirans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection