{!! Form::open(['route' => ['setting.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
   
    <a href="{{ route('setting.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Apakah anda ingin menghapus data setting $attribute ?')"
    ]) !!}
</div>
{!! Form::close() !!}
