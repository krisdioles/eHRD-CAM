<div class="form-group">
	<form action="{{ url('/penggajian/'.$penggajian->idpenggajian.'/show') }}">
	    <button class="btn-xs btn-link" type="submit">Show</button>
	</form>
</div>

<div class="form-group">
	<form action="{{ url('/penggajian/'.$penggajian->pegawai_id.'/create') }}">
	    <button class="btn-xs btn-link" type="submit">Create</button>
	</form>
</div>

<div class="form-group">
	<form action="{{ url('/penggajian/'.$penggajian->idpenggajian.'/delete') }}">
	    <button class="btn-xs btn-link" type="submit">Delete</button>
	</form>
</div>
