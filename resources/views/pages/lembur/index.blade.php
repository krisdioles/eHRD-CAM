@extends('app')

@include('partials.menu')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  
  <h2 class="sub-header">Lembur</h2>
  <div class="table-responsive">
    <table class="table table-hover" id="lembur" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>#</th>
          <th>Tanggal Lembur</th>
          <th>Jangka Waktu</th>
          <th>Status</th>

          @if(Auth::user()->idpegawai==1)
            <th>Diajukan Oleh</th>
            <th width="26%"></th>
          @else
            <th width="17%"></th>
          @endif

        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>#</th>
          <th>Tanggal Lembur</th>
          <th>Jangka Waktu</th>
          <th>Status</th>
          @if(Auth::user()->idpegawai==1)
            <th>Diajukan Oleh</th>
            <th width="26%"></th>
          @else
            <th width="17%"></th>
          @endif
        </tr>
      </tfoot>
    </table>

    @if(Auth::user()->idpegawai!=1)
      <a class="btn btn-default" href="{{ url('/lembur/create') }}" role="button">Create</a>
    @endif
    
  </div>
</div>
@stop

@if(Auth::user()->idpegawai==1)
  @push('scripts')
  <script>
  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#lembur tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" />' );
    } );

    var table = $('#lembur').DataTable({
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
        ajax: '{!! route('lembur.data') !!}',
        columns: [
            { data: 'idlembur', name: 'lembur.idlembur' },
            { data: 'tgllembur', name: 'lembur.tgllembur' },
            { data: 'jangkawaktu', name: 'lembur.jangkawaktu' },
            { data: 'status', name: 'lembur.status' },
            { data: 'nama', name: 'pegawai.nama' },
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
@else
  @push('scripts')
  <script>
  $(document).ready(function() {
      // Setup - add a text input to each footer cell
      $('#lembur tfoot th').each( function () {
          var title = $(this).text();
          $(this).html( '<input type="text" />' );
      } );

      var table = $('#lembur').DataTable({
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
          ajax: '{!! route('lembur.data') !!}',
          columns: [
              { data: 'idlembur', name: '.idlembur' },
              { data: 'tgllembur', name: 'tgllembur' },
              { data: 'jangkawaktu', name: 'jangkawaktu' },
              { data: 'status', name: 'status' },
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