<div class="form-group">
  <form action="{{ url('/absensi/'.$absensi->idabsensi.'/show') }}">
      <button class="btn-xs btn-link" type="submit">Show</button>
  </form>
</div>

<div class="form-group">
	<form action="{{ url('/absensi/'.$absensi->idabsensi.'/edit') }}">
	    <button class="btn-xs btn-link" type="submit">Edit</button>
	</form>
</div>

<!-- Button trigger modal -->
<div class="form-group">
  <form action="{{ url('/absensi/'.$absensi->idabsensi.'/delete') }}">
      <button class="btn-xs btn-link" type="submit">Delete</button>
  </form>
</div>