@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            TK
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($tk, ['route' => ['tk.update', $tk->id], 'method' => 'patch']) !!}

                        @include('tk.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
