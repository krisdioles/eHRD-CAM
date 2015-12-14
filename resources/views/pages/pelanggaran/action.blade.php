<div class="form-group">
	<form action="{{ url('/pelanggaran/'.$pelanggaran->idpelanggaran.'/show') }}">
	    <button class="btn-xs btn-link" type="submit">Show</button>
	</form>
</div>

<div class="form-group">
	<form action="{{ url('/pelanggaran/'.$pelanggaran->idpelanggaran.'/edit') }}">
	    <button class="btn-xs btn-link" type="submit">Edit</button>
	</form>
</div>

<div class="form-group">
	{!! Form::open(['method' => 'DELETE', 'route' => ['pelanggaran.destroy', $pelanggaran->idpelanggaran]]) !!}
	    <button class="btn-xs btn-link" type="submit">Delete</button>
	{!! Form::close() !!}
</div>