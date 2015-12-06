@extends('app')

@include('partials.menu')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h2 class="sub-header">Penilaian</h2>
  <div class="table-responsive">
    <table class="table table-hover" id="penilaian" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Pegawai</th>
          <th>Nilai Kompetensi</th>
          <th>Nilai Kedisiplinan</th>
          <th>Nilai Perilaku</th>
          <th>Keterangan</th>
          <th></th>
        </tr>
      </thead>
    </table>

    @if(Auth::user()->idpegawai==1)
      <a class="btn btn-default" href="{{ url('/penilaian/create') }}" role="button">Create</a>
    @endif
    
  </div>
</div>
@stop

@push('scripts')
  <script>
  $(document).ready(function() {
      $('#penilaian').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{!! route('penilaian.data') !!}',
          columns: [
              { data: 'idpenilaian', name: 'penilaian.idpenilaian' },
              { data: 'nama', name: 'pegawai.nama' },
              //{ data: 'tglpenilaian', name: 'penilaian.tglpenilaian' },
              { data: 'nilaikompetensi', name: 'penilaian.nilaikompetensi' },
              { data: 'nilaikedisiplinan', name: 'penilaian.nilaikedisiplinan' },
              { data: 'nilaiperilaku', name: 'penilaian.nilaiperilaku' },
              { data: 'keterangan', name: 'penilaian.keterangan' },
              { data: 'action', name: 'action', orderable: false, searchable: false }
          ]
      });
  });
  </script>
  @endpush