@extends('app')

@section('spcss')
	<!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
@endsection

@include('partials.menu')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="page-header">Detail Profil</h2>
    <div class="col-md-6">
	    <div class="panel panel-default">
	    	<div class="panel-heading">Lembur</div>
	  		<div class="panel-body">
			    <div class="table-responsive">
				    <table class="table table-striped" id="lembur" cellspacing="0" width="100%">
				      <thead>
				        <tr>
				          <th>Tanggal Lembur</th>
				          <th>Jangka Waktu</th>
				          <th>Status</th>
				        </tr>
				      </thead>
				      <tfoot>
				        <tr>
				        </tr>
				      </tfoot>
				    </table>
			   	</div>
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">Cuti</div>
	  		<div class="panel-body">
			   	<div class="table-responsive">
				    <table class="table table-striped" id="cuti" cellspacing="0" width="100%">
				      <thead>
				        <tr>
				          <th>Jenis Cuti</th>
				          <th>Tanggal Awal</th>
				          <th>Tanggal Akhir</th>
				          <th>Status</th>
				        </tr>
				      </thead>
				      <tfoot>
				        <tr>
				        	<td>Jenis Cuti</td>
				            <td>Tanggal Awal</td>
				            <td>Tanggal Akhir</td>
				            <td>Status</td>
				        </tr>
				      </tfoot>
				    </table>
			   	</div>
			</div>
		</div>
	</div>

</div>
@endsection

@section('spjs')
	<script src="../js/bootstrap.min.js"></script>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
	$('#lembur').DataTable({
	    processing: true,
	    serverSide: true,
	    ordering: false,
	    searching: false,
	    ajax: '{!! route('dashboard.lembur') !!}',
	    columns: [
	        { data: 'tgllembur', name: 'tgllembur' },
	        { data: 'jangkawaktu', name: 'jangkawaktu' },
	        { data: 'status', name: 'status' },
	    ],   
	});

	// Setup - add a text input to each footer cell
	$('#cuti tfoot td').each( function () {
	    var title = $(this).text();
	    $(this).html( '<input type="text" />' );
	} );

	var table = $('#cuti').DataTable({
	    processing: true,
	    serverSide: true,
	    ordering: false,
	    // searching: false,
	    ajax: '{!! route('dashboard.cuti') !!}',
	    columns: [
            { data: 'jeniscuti', name: 'jeniscuti' },
            { data: 'tglawal', name: 'tglawal' },
            { data: 'tglakhir', name: 'tglakhir' },
            { data: 'status', name: 'status' },
	    ],     
	});

	// Apply the search
    table.columns().every( function () {
        var that = this;
   
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        });
    });
});
</script>
@endpush