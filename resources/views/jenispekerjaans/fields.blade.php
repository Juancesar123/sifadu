<!-- Jenis Pekerjaan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_pekerjaan', 'Jenis Pekerjaan:') !!}
    {!! Form::text('jenis_pekerjaan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('jenispekerjaans.index') !!}" class="btn btn-default">Batalkan</a>
</div>
