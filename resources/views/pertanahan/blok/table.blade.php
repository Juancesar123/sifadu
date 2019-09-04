<?php
/*
 * Created by Arif Budiman
 * Updated by Arif Budiman
 */
?>
@section('css')
    @include('layouts.datatables_css')
@endsection

{!! $dataTable->table(['width' => '100%']) !!}

@section('scripts')
    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}
@endsection