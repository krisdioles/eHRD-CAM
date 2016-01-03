<div class="form-group">
  <form action="{{ url('/pegawai/'.$pegawai->idpegawai.'/show') }}">
      <button class="btn-xs btn-link" type="submit">Show</button>
  </form>
</div>

<div class="form-group">
	<form action="{{ url('/pegawai/'.$pegawai->idpegawai.'/edit') }}">
	    <button class="btn-xs btn-link" type="submit">Edit</button>
	</form>
</div>

<!-- Button trigger modal -->
<div class="form-group">
  <form action="{{ url('/pegawai/'.$pegawai->idpegawai.'/delete') }}">
      <button class="btn-xs btn-link" type="submit">Delete</button>
  </form>
</div>