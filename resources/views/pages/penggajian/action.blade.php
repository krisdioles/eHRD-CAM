<div class="form-group">
	<form action="{{ url('/penggajian/'.$penggajian->idpenggajian.'/show') }}">
	    <button class="btn-xs btn-link" type="submit">Show</button>
	</form>
</div>

@if(Auth::user()->idpegawai==1)
	<div class="form-group">
		<form action="{{ url('/penggajian/'.$penggajian->idpenggajian.'/edit') }}">
		    <button class="btn-xs btn-link" type="submit">Edit</button>
		</form>
	</div>

	<div class="form-group">
		<form action="{{ url('/penggajian/'.$penggajian->idpenggajian.'/delete') }}">
		    <button class="btn-xs btn-link" type="submit">Delete</button>
		</form>
	</div>
@endif
