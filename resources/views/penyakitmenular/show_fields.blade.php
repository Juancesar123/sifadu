<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $penyakitmenular->id !!}</p>
</div>

<!-- no kk  Field -->
<div class="form-group">
    {!! Form::label('no_kk', 'No KK :') !!}
    <p>{!! $penyakitmenular->no_kk !!}</p>
</div>

<!-- nama kepala kk Field -->
<div class="form-group">
    {!! Form::label('nama_kepala_kk', 'Nama Kepala KK :') !!}
    <p>{!! $penyakitmenular->nama_kepala_kk !!}</p>
</div>

<!-- nama penderita Field -->
<div class="form-group">
    {!! Form::label('nama_penderita', 'Nama Penderita :') !!}
    <p>{!! $penyakitmenular->nama_penderita !!}</p>
</div>

{{-- usia field --}}
<div class="form-group">
    {!! Form::label('usia', 'Usia :') !!}
    <p>{!! $penyakitmenular->usia !!}</p>
</div>

{{-- diagnosa field --}}
<div class="form-group">
    {!! Form::label('diagnosa', 'Diagnosa :') !!}
    <p>{!! $penyakitmenular->diagnosa !!}</p>
</div>

{{-- rujukan field --}}
<div class="form-group">
    {!! Form::label('rujukan', 'Rujukan :') !!}
    <p>{!! $penyakitmenular->rujukan !!}</p>
</div>

{{-- jaminan kesehatan field --}}
<div class="form-group">
    {!! Form::label('jaminan_kesehatan', 'Jaminan Kesehatan :') !!}
    <p>{!! $penyakitmenular->jaminan_kesehatan !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Dibuat pada:') !!}
    <p>{!! $penyakitmenular->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Diperbarui pada:') !!}
    <p>{!! $penyakitmenular->updated_at !!}</p>
</div>
