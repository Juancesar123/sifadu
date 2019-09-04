{!! Form::open(['route' => ['suratketeranganskcks.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
     <a href="{{ route('letter.covering.skck-letter', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-print"> </i> Print
    </a>
    <a href="{{ route('suratketeranganskcks.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Apakah anda ingin menghapus data pengajuan skck ?')"
    ]) !!}
</div>
{!! Form::close() !!}
