{!! Form::hidden('pegawai_id', Auth::user()->idpegawai) !!}
{!! Form::hidden('status', 'Pending') !!}

<div class="form-group">
	{!! Form::label('jeniscuti', 'Jenis Cuti : ') !!}
	{!! Form::text('jeniscuti', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('tglawal', 'Tanggal Awal : ') !!}
	{!! Form::input('date', 'tglawal', $cuti->tglawal->format('Y-m-d'), ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('tglakhir', 'Tanggal Akhir : ') !!}
	{!! Form::input('date', 'tglakhir', $cuti->tglakhir->format('Y-m-d'), ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('nomorsurat', 'Nomor Surat : ') !!}
	{!! Form::text('nomorsurat', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('alamatcuti', 'Alamat Cuti : ') !!}
	{!! Form::textarea('alamatcuti', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('keterangan', 'Keterangan : ') !!}
	{!! Form::textarea('keterangan', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group" align="center">
	{!! Form::submit($submitButtonText, ['class'=>'btn btn-primary']) !!}
	<a class="btn btn-primary" href="/eHRD-CAM/public/cuti" role="button">Kembali</a>
</div>