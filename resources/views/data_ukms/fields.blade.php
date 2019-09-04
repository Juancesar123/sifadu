
<!-- Pengelola Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pengelola', 'Pengelola:') !!}
    {!! Form::text('pengelola', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- modal usaha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('modal_usaha', 'Modal Usaha :') !!}
    {!! Form::number('modal_usaha', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Bentuk Usaha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bentuk_usaha', 'Bentuk Usaha:') !!}
    {!! Form::text('bentuk_usaha', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Nama Produk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_produk', 'Nama Produk:') !!}
    {!! Form::text('nama_produk', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Bahan Baku Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bahan_baku', 'Bahan Baku:') !!}
    {!! Form::text('bahan_baku', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Alamat Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('alamat', 'Alamat:') !!}
    {!! Form::textarea('alamat', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Jumlah Staff Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah_staff', 'Jumlah Staff:') !!}
    {!! Form::number('jumlah_staff', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Omset Field -->
<div class="form-group col-sm-6">
    {!! Form::label('omset', 'Omset pertahun :') !!}
    {!! Form::number('omset', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('dataUkms.index') !!}" class="btn btn-default">Batalkan</a>
</div>
