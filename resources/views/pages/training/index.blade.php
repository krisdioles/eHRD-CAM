@extends('app')

@include('partials.menu')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h2 class="sub-header">Training</h2>
  <div class="table-responsive">
    <table class="table table-hover" id="training" cellspacing="0" width="100%">
      <thead>
        <tr>
            <th>#</th>
            <th>Nama Training</th>
            <th>Lokasi</th>
            <th>Tanggal Training</th>
            @if(Auth::user()->idpegawai==1)
                <th>Anggaran (Rp.)</th>
            @endif
          <th width="17%"></th>
        </tr>
      </thead>
      <tfoot>
        <tr>
            <th>#</th>
            <th>Nama Training</th>
            <th>Lokasi</th>
            <th>Tanggal Training</th>
            @if(Auth::user()->idpegawai==1)
                <th>Anggaran (Rp.)</th>
            @endif
            <th width="17%"></th>
        </tr>
      </tfoot>
    </table>

    @if(Auth::user()->idpegawai==1)
      <a class="btn btn-default" href="{{ url('/training/create') }}" role="button">Add</a>
    @endif
  </div>
</div>
@stop

@if(Auth::user()->idpegawai==1)
    @push('scripts')
    <script>
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#training tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="text" />' );
        } );

        var table = $('#training').DataTable({
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
            ajax: '{!! route('training.data') !!}',
            columns: [
                { data: 'idtraining', name: 'idtraining' },
                { data: 'namatraining', name: 'namatraining' },
                { data: 'lokasi', name: 'lokasi' },
                { data: 'tgltraining', name: 'tgltraining' },
                { data: 'anggaran', name: 'anggaran' },
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
    @push('scripts')
    <script>
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#training tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="text" />' );
        } );

        var table = $('#training').DataTable({
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
            ajax: '{!! route('training.data') !!}',
            columns: [
                { data: 'idtraining', name: 'idtraining' },
                { data: 'namatraining', name: 'namatraining' },
                { data: 'lokasi', name: 'lokasi' },
                { data: 'tgltraining', name: 'tgltraining' },
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
@endif