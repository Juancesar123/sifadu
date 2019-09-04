<!-- No Ktp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_KTP', 'No Ktp:') !!}
    {!! Form::text('no_KTP', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control', 'required' => 'true']) !!}
</div>

<!-- Alamat Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('alamat', 'Alamat:') !!}
    {!! Form::textarea('alamat', null, ['class' => 'form-control', 'required' => 'true']) !!}
</div>

<!-- Kondisi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kondisi', 'Kondisi:') !!}
    {!! Form::text('kondisi', null, ['class' => 'form-control', 'required' => 'true']) !!}
</div>

<!-- Status Penanganan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_penanganan', 'Status Penanganan:') !!}
    {!! Form::text('status_penanganan', null, ['class' => 'form-control', 'required' => 'true']) !!}
</div>

<!-- biaya renovasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('biaya_renovasi', 'Biaya Renovasi :') !!}
    {!! Form::text('biaya_renovasi', null, ['class' => 'form-control', 'required' => 'true']) !!}
</div>

<!-- Gambar awal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gambar_awal', 'Gambar Awal :') !!}
    {!! Form::file('gambar_awal', null, ['class' => 'form-control', 'required' => 'true']) !!}
</div>

<!-- Gambar pasca renov Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gambar_sesudah', 'Gambar Pasca Renov :') !!}
    {!! Form::file('gambar_sesudah', null, ['class' => 'form-control', 'required' => 'true']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('rutilahus.index') !!}" class="btn btn-default">Cancel</a>
</div>
