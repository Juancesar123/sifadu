<!-- nama pemilik Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pemilik', 'Nama Pemilik :') !!}
    {!! Form::text('pemilik', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- lokasi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lokasi', 'Lokasi :') !!}
    {!! Form::text('lokasi', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- modal usaha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('modal_usaha', 'Modal Usaha :') !!}
    {!! Form::number('modal_usaha', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Nama Produk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('produk_dagang', 'Produk Dagang :') !!}
    {!! Form::text('produk_dagang', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Omset Field -->
<div class="form-group col-sm-6">
    {!! Form::label('omset', 'Omset perbulan :') !!}
    {!! Form::number('omset', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('datawarung.index') !!}" class="btn btn-default">Cancel</a>
</div>
