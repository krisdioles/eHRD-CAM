<div class="form-group">
	<form action="{{ url('/pegawai/'.$pegawai->idpegawai.'/edit') }}">
	    <button class="btn-xs btn-link" type="submit">Edit</button>
	</form>
</div>

<div class="form-group">
	{!! Form::open(['method' => 'DELETE', 'route' => ['pegawai.destroy', $pegawai->idpegawai]]) !!}
	    <button class="btn-xs btn-link" type="submit">Delete</button>
	{!! Form::close() !!}
</div>