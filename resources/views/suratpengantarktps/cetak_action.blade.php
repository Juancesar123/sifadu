{!! Form::open(['route' => ['suratpengantarktps.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('suratpengantarktps.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-print"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
