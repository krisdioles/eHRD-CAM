@extends('app')

@include('partials.menu')

@section('content')

@if(Auth::user()->idpegawai==1)
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h2 class="sub-header">Absensi</h2>
      <div class="table-responsive">
        <table class="table table-hover" id="absensi" cellspacing="0" width="100%">
          <thead>
            <tr>
                <th>#</th>
                <th>Nama Pegawai</th>
                <th>Waktu Masuk</th>
                <th>Waktu Pulang</th>
                <th>Status Masuk</th>
                <th>Status Pulang</th>
                <th>Keterangan</th>
                <th></th>
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>#</th>
                <th>Nama Pegawai</th>
                <th>Waktu Masuk</th>
                <th>Waktu Pulang</th>
                <th>Status Masuk</th>
                <th>Status Pulang</th>
                <th>Keterangan</th>
              <th></th>
            </tr>
          </tfoot>
        </table>    
      </div>
    </div>
    @stop

    @push('scripts')
    <script>
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#absensi tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="text" />' );
        } );

        var table = $('#absensi').DataTable({
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
                targets: [0,6],
                visible: false
            }],
            order: [[ 2, 'desc' ]],
            processing: true,
            serverSide: true,
            ajax: '{!! route('absensi.data') !!}',
            columns: [
                { data: 'idabsensi', name: 'absensi.idabsensi' },
                { data: 'nama', name: 'pegawai.nama' },
                { data: 'waktumasuk', name: 'absensi.waktumasuk' },
                { data: 'waktupulang', name: 'absensi.waktupulang' },
                { data: 'statusmasuk', name: 'absensi.statusmasuk' },
                { data: 'statuspulang', name: 'absensi.statuspulang' },
                { data: 'keterangan', name: 'absensi.keterangan' },
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
            });
        });
    });
    </script>
    @endpush
@else
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h2 class="sub-header">Absensi</h2>

    @if(\Carbon\Carbon::now()->day!=\Auth::user()->absensi->last()->waktumasuk->day)
      
        <div class="col-md-3 col-md-offset-3" align="right">
          <a class="btn btn-success btn-lg" href="{{ url('/absensi/masuk') }}" role="button">Masuk</a>
        </div>

        <div class="col-md-3" align="left">
          <a class="btn btn-danger btn-lg disabled" href="{{ url('/absensi/pulang') }}" role="button">Pulang</a>
        </div>
      
    @else

      <div class="col-md-3 col-md-offset-3" align="right">
        <a class="btn btn-success btn-lg disabled" href="{{ url('/absensi/masuk') }}" role="button">Masuk</a>
      </div>

      <div class="col-md-3" align="left">
        <a class="btn btn-danger btn-lg" href="{{ url('/absensi/pulang') }}" role="button">Pulang</a>
      </div>

    @endif
    <br><br><br><br>
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-hover" id="absensi" cellspacing="0" width="100%">
              <thead>
                <tr>
                    <th>#</th>
                    <th>Waktu Masuk</th>
                    <th>Waktu Pulang</th>
                    <th>Status Masuk</th>
                    <th>Status Pulang</th>
                    <th>Keterangan</th>
                    <th></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>#</th>
                    <th>Waktu Masuk</th>
                    <th>Waktu Pulang</th>
                    <th>Status Masuk</th>
                    <th>Status Pulang</th>
                    <th>Keterangan</th>
                  <th></th>
                </tr>
              </tfoot>
            </table>    
        </div>
    </div>

    @push('scripts')
    <script>
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#absensi tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="text" />' );
        } );

        var table = $('#absensi').DataTable({
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
                targets: [0,5],
                visible: false
            }],
            order: [[ 1, 'desc' ]],
            processing: true,
            serverSide: true,
            ajax: '{!! route('absensi.data') !!}',
            columns: [
                { data: 'idabsensi', name: 'absensi.idabsensi' },
                { data: 'waktumasuk', name: 'absensi.waktumasuk' },
                { data: 'waktupulang', name: 'absensi.waktupulang' },
                { data: 'statusmasuk', name: 'absensi.statusmasuk' },
                { data: 'statuspulang', name: 'absensi.statuspulang' },
                { data: 'keterangan', name: 'absensi.keterangan' },
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
            });
        });
    });
    </script>
    @endpush

  </div>
@endif