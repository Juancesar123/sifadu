{!! Form::open(['route' => ['suratpengantarkks.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('blankopengantar', ['id'=>$id,'jenis'=>1]) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-print"></i> Pengantar KK
    </a>
    
    <a href="cetakkartukeluargaf16/{{$id}}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-print"></i> KK F16
    </a>
    {{--
    <a href="{{ route('blankopengantar', ['id'=>$id,'jenis'=>1]) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-print"></i> Cetak KK
    </a>
    <a href="{{ route('letter.covering.family_card', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-print"></i> Cetak KK
    </a>    
     <a href="cetakkartukeluarga/{{$id}}"class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-print"></i> testing
    </a> --}}
    
    <a href="{{ route('suratpengantarkks.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"> Edit</i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
