{!! Form::open(['route' => ['keteranganPenghasilans.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('keteranganPenghasilans.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    <a href="{{ route('keteranganPenghasilans.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    <a href="{{ route('letter.covering.keterangan-penghasilan', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-print"></i> Cetak
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}