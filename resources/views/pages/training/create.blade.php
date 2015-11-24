@extends('app')

@section('spcss')
	<!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
@endsection

@section('content')
<div class="col-md-8 col-md-offset-2">
	<h2 class="sub-header">Create Training</h2>
	<div class="table-responsive">
	    <table class="table table-striped">
	      <thead>
	        <tr>
	          <th>#</th>
	          <th>Nama Training</th>
	          <th>Lokasi</th>
	          <th>Tanggal Training</th>
	          <th>Anggaran</th>
	        </tr>
	      </thead>
	      <tbody>

	        <td>1,001</td>
	          <td>Lorem</td>
	          <td>ipsum</td>
	          <td>dolor</td>
	          <td>sit</td>

	      </tbody>
	    </table>
	</div>
</div>
@endsection

@section('spjs')
	<script src="../js/bootstrap.min.js"></script>
@endsection