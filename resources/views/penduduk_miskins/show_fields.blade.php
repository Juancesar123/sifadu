<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $penduduk->id !!}</p>
</div>

<!-- Nik Field -->
<div class="form-group">
    {!! Form::label('nik', 'Nik:') !!}
    <p>{!! $penduduk->nik !!}</p>
</div>

<!-- No Kk Field -->
<div class="form-group">
    {!! Form::label('no_kk', 'No Kk:') !!}
    <p>{!! $penduduk->no_kk !!}</p>
</div>

<!-- Nama Lengkap Field -->
<div class="form-group">
    {!! Form::label('nama_lengkap', 'Nama Lengkap:') !!}
    <p>{!! $penduduk->nama_lengkap !!}</p>
</div>

<!-- Alamat Field -->
<div class="form-group">
    {!! Form::label('alamat', 'Alamat:') !!}
    <p>{!! $penduduk->alamat !!}</p>
</div>

<!-- indikator_kemiskinan Field -->
<div class="form-group">
    {!! Form::label('indikator_kemiskinan', 'Indikator Kemiskinan:') !!}
    <ol>
    	@foreach($penduduk->kemiskinan as $kemiskinan)
	    	<li>{{ $kemiskinan->indikator->indikator_kemiskinan }}</li>
    	@endforeach
    </ol>
</div>