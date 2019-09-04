<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $datawarung->id !!}</p>
</div>

<!-- Pengelola Field -->
<div class="form-group">
    {!! Form::label('pemilik', 'Pemilik :') !!}
    <p>{!! $datawarung->pemilik !!}</p>
</div>

<!-- Bentuk Usaha Field -->
<div class="form-group">
    {!! Form::label('lokasi', 'Lokasi :') !!}
    <p>{!! $datawarung->lokasi !!}</p>
</div>

<!-- Nama Produk Field -->
<div class="form-group">
    {!! Form::label('modal_usaha', 'Modal Usaha :') !!}
    <p>{!! $datawarung->modal_usaha !!}</p>
</div>

<!-- Bahan Baku Field -->
<div class="form-group">
    {!! Form::label('produk_dagang', 'Produk Dagang :') !!}
    <p>{!! $datawarung->produk_dagang !!}</p>
</div>

<!-- Alamat Field -->
<div class="form-group">
    {!! Form::label('omset', 'Omset :') !!}
    <p>{!! $datawarung->omset !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $datawarung->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $datawarung->updated_at !!}</p>
</div>
