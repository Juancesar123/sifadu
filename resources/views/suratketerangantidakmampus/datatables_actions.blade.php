{!! Form::open(['route' => ['suratketerangantidakmampus.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('letter.covering.sktm', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-print"></i> Cetak Pengantar
    </a>
    <a href="{{ route('suratketerangantidakmampus.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
