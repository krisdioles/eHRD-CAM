<div class="form-group">
	<form action="{{ url('/penilaian/'.$penilaian->idpenilaian.'/show') }}">
	    <button class="btn-xs btn-link" type="submit">Show</button>
	</form>
</div>

<div class="form-group">
	<form action="{{ url('/penilaian/'.$penilaian->pegawai_id.'/edit') }}">
	    <button class="btn-xs btn-link" type="submit">Edit</button>
	</form>
</div>

<!-- Button trigger modal -->
<div class="form-group">
	<form action="{{ url('/penilaian/'.$penilaian->idpenilaian.'/delete') }}">
	    <button class="btn-xs btn-link" type="submit">Delete</button>
	</form>
</div>