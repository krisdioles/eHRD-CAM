@extends('app')

@include('partials.menu')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="sub-header">Pegawai</h2>
    <div class="col-md-12 col-md-offset-0">
                <div class="table-responsive">
                  <table class="table table-striped" id="pegawai" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Kode Pegawai</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Jabatan</th>
                        <th></th>
                      </tr>
                    </thead>
                    
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Kode Pegawai</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Jabatan</th>
                            <th></th>
                        </tr>
                    </tfoot>
                  </table>
                </div>
        <a class="btn btn-default" href="{{ url('/auth/register') }}" role="button">Add</a>
    </div>
</div>
@stop

@push('scripts')
<script>
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#pegawai tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" />' );
    } );

    var table = $('#pegawai').DataTable({
        dom: 'Bfrtlip',
        buttons: [
            {
                extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'copyFlash',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'csvFlash',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excelFlash',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfFlash',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis',
        ],
        columnDefs: [{
            targets: 0,
            visible: false
        }],
        processing: true,
        serverSide: true,
        ajax: '{!! route('pegawai.data') !!}',
        columns: [
            { data: 'idpegawai', name: 'idpegawai' },
            { data: 'kodepegawai', name: 'kodepegawai' },
            { data: 'nama', name: 'nama' },
            { data: 'jeniskelamin', name: 'jeniskelamin' },
            { data: 'jabatan', name: 'jabatan' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
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
        } );
    } );
    
});
</script>
@endpush