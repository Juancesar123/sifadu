{!! Form::open(['route' => ['formpengajuankk.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('formpengajuankk.show', $id) }}" class="btn btn-default btn-xs">
        <i class="glyphicon glyphicon-list"></i> List Nama
    </a>
    <a href="{{ route('formpengantarkk', ['jenis'=>0]) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-print"></i> Print
    </a>

    <a href="{{ route('formpengajuankk.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"> Edit</i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Apakah anda ingin menghapus data ini ?')"
    ]) !!}
</div>
{!! Form::close() !!}
