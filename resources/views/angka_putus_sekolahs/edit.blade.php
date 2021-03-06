@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Angka Putus Sekolah
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($angkaPutusSekolah, ['route' => ['angkaPutusSekolahs.update', $angkaPutusSekolah->id], 'method' => 'patch']) !!}

                        @include('angka_putus_sekolahs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection