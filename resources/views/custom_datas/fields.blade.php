<!-- Title Field -->
<div class="form-group col-sm-4">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Category Field -->
<div class="form-group col-sm-4">
    {!! Form::label('category', 'Category:') !!}
    <select class="form-control" name="category" id="Cat" required>
        <option value="">---</option>
        <option value="Pertambangan">Pertambangan</option>
        <option value="Pertanian">Pertanian</option>
        <option value="Budi Daya Hutan">Budi Daya Hutan</option>
    </select>
</div>

<div class="form-group col-sm-4">
    {!! Form::label('subcategory', 'SubCategory:') !!}
    <select class="form-control" name="subcategory" id="SubCat" required>
    </select>
</div>

<!-- Description Field -->
<div class="form-group col-sm-8 col-lg-8">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => 6]) !!}
</div>

<!-- Option Field -->
{{--
<div class="form-group col-sm-6">
    {!! Form::label('option', 'Option:') !!}
    {!! Form::text('option', null, ['class' => 'form-control']) !!}

    {!! Form::label('option', 'Warna Penanda:') !!}
    {!! Form::color('option', null, ['class' => 'form-control']) !!}
</div>
--}}
{!! Form::hidden('option', null, ['id' => 'option', 'class' => 'form-control']) !!}

{!! Form::hidden('redirect', $redirect, ['id' => 'redirect', 'class' => 'form-control']) !!}
<input type="hidden" class="form-control" id="createFitur" value="Data Ekonomi" name="fitur" placeholder="">

<div id="option-zona" class="form-group col-sm-6" hidden>
    {!! Form::label('option-color', 'Warna Penanda:') !!}
    {!! Form::color('option-color', null, ['id' => 'option-color','class' => 'form-control', 'style' => 'width: 30px;padding: 2px;height: 30px;']) !!}
</div>

<div id="option-point" class="form-group col-sm-6" hidden>
    {!! Form::label('option-icon','Pilih Icon:') !!}
    {!! Form::select('option-icon', [
        asset('/img/icons/kantor_pemerintahan.png')         => 'Kantor Pemerintahan',
        asset('/img/icons/atraksi_wisata.png')              => 'atraksi wisata',
        asset('/img/icons/bangunan_bersejarah.png')         => 'bangunan bersejarah',
        asset('/img/icons/menara.png')                      => 'menara',
        asset('/img/icons/pembangkit_listrik.png')          => 'pembangkit listrik',
        asset('/img/icons/peribadatan_gereja.png')          => 'gereja',
        asset('/img/icons/peribadatan_masjid.png')          => 'masjid',
        asset('/img/icons/peribadatan_pura.png')            => 'pura',
        asset('/img/icons/peribadatan_vihara.png')          => 'vihara',
        asset('/img/icons/fasilitas_kesehatan.png')         => 'fasilitas kesehatan',
        asset('/img/icons/fasilitas_pos.png')               => 'fasilitas pos',
        asset('/img/icons/fasilitas_pasar.png')             => 'fasilitas pasar',
        asset('/img/icons/fasilitas_pendidikan.png')        => 'fasilitas_pendidikan',
        asset('/img/icons/segitiga_berlubang_magenta.png')  => 'segitiga berlubang magenta',
        asset('/img/icons/segitiga_berlubang_merah.png')    => 'segitiga berlubang merah',
        asset('/img/icons/segitiga_berlubang_biru.png')     => 'segitiga berlubang biru',
        asset('/img/icons/segitiga_berlubang_kuning.png')   => 'segitiga berlubang kuning',
        asset('/img/icons/segitiga_berlubang_hijau.png')    => 'segitiga berlubang hijau',
        asset('/img/icons/segitiga_hijau.png')              => 'segitiga hijau',
        asset('/img/icons/segitiga_kuning.png')             => 'segitiga kuning',
        asset('/img/icons/segitiga_magenta.png')            => 'segitiga magenta',
        asset('/img/icons/segitiga_biru.png')               => 'segitiga biru',
        asset('/img/icons/segitiga_merah.png')              => 'segitiga merah',
        asset('/img/icons/persegi_biru.png')                => 'persegi biru',
        asset('/img/icons/persegi_hijau.png')               => 'persegi hijau',
        asset('/img/icons/persegi_kuning.png')              => 'persegi kuning',
        asset('/img/icons/persegi_magenta.png')             => 'persegi magenta',
        asset('/img/icons/persegi_merah.png')               => 'persegi merah',
        asset('/img/icons/persegi_berlubang_magenta.png')   => 'persegi berlubang_magenta',
        'lainnya'                                           => 'Masukkan Url sendiri',
    ], null, ['id' => 'option-icon','class' => 'form-control']) !!}

    {!! Form::label('option-icon-url',  'Url ke icon:') !!}
    {!! Form::text('option-icon-url', null, ['id' => 'option-icon-url','class' => 'form-control']) !!}
</div>

<!-- Geom Field -->
@include('leaflet.leaflet_1_3')
@include('leaflet.leaflet_draw')

<div class="form-group col-sm-12 col-lg-12">
    {{--
    {!! Form::label('geom', 'Geom:') !!}
    {!! Form::textarea('geom', null, ['class' => 'form-control']) !!}
    --}}

    @include('leaflet.input_custom', [
        'input_name' => 'geom', 
        'input_label' => 'Lokasi', 
        'input_data' => (isset($customData)) ? $customData->geom : Null,
    ])
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Simpan', ['id' => 'button_submit', 'class' => 'btn btn-primary']) !!}
    <a href="{!! route('mekonomis.index') !!}" class="btn btn-default">Batalkan</a>
</div>

@include('leaflet.input_custom_js')
