<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $jenispekerjaan->id !!}</p>
</div>

<!-- Jenis Pekerjaan Field -->
<div class="form-group">
    {!! Form::label('jenis_pekerjaan', 'Jenis Pekerjaan:') !!}
    <p>{!! $jenispekerjaan->jenis_pekerjaan !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Dibuat pada:') !!}
    <p>{!! $jenispekerjaan->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Diperbarui pada:') !!}
    <p>{!! $jenispekerjaan->updated_at !!}</p>
</div>

