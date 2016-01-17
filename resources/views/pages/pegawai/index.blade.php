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
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Agama</th>
                        <th>Gaji Pokok</th>
                        <th>Tunjangan Tetap</th>
                        <th>Status Kawin</th>
                        <th>Pendidikan Terakhir</th>
                        <th>Hak Cuti</th>
                        <th>Status Aktif</th>
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
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Agama</th>
                            <th>Gaji Pokok</th>
                            <th>Tunjangan Tetap</th>
                            <th>Status Kawin</th>
                            <th>Pendidikan Terakhir</th>
                            <th>Hak Cuti</th>
                            <th>Status Aktif</th>
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
            targets: [0,5,6,7,8,9,10,11,12,13,14],
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
            { data: 'tgllahir', name: 'tgllahir' },
            { data: 'alamat', name: 'alamat' },
            { data: 'telepon', name: 'telepon' },
            { data: 'agama', name: 'agama' },
            { data: 'gajipokok', name: 'gajipokok' },
            { data: 'tunjangantetap', name: 'tunjangantetap' },
            { data: 'statuskawin', name: 'statuskawin' },
            { data: 'pendidikanterakhir', name: 'pendidikanterakhir' },
            { data: 'hakcuti', name: 'hakcuti' },
            { data: 'statusaktif', name: 'statusaktif' },
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