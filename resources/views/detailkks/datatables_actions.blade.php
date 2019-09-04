{!! Form::open(['route' => ['formpengajuankk.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('formpengajuankks', ['jenis'=>0]) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-print"></i> Permohonan KK
    </a>
    
    {{--<a href="{{ route('f15', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-print"></i> KK F15
    </a>
   
    <a href="{{ route('blankopengantar', ['id'=>$id,'jenis'=>1]) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-print"></i> Cetak KK
    </a>
    <a href="{{ route('letter.covering.family_card', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-print"></i> Cetak KK
    </a>    
     <a href="cetakkartukeluarga/{{$id}}"class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-print"></i> testing
    </a> --}}
    
    <a href="{{ route('formpengajuankk.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"> Edit</i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
