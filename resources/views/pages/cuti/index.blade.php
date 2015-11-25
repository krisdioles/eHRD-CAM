@extends('app')

@include('partials.menu')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">Cuti</h2>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Jenis Cuti</th>
                  <th>Tanggal Awal</th>
                  <th>Tanggal Akhir</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>

              @foreach($cuti as $cuti)
                <tr height="2px">
                  <td>{{ $cuti->idcuti }}</td>
                  <td><a href="{{ url('/cuti', $cuti->idcuti) }}">{{ $cuti->jeniscuti }}</td>
                  <td>{{ $cuti->tglawal->toDateString() }}</td>
                  <td>{{ $cuti->tglakhir->toDateString() }}</td>
                  <td>sit</td>
                  <td width="5">
                      <form action="{{ url('/cuti/'.$cuti->idcuti.'/edit') }}">
                          <button class="btn-xs btn-link" type="submit">Edit</button>
                      </form>
                  </td>
                  <td width="5">
                      {!! Form::open(['method' => 'DELETE', 'route' => ['cuti.destroy', $cuti->idcuti]]) !!}
                          <button class="btn-xs btn-link" type="submit">Delete</button>
                      {!! Form::close() !!}
                  </td>
                </tr>
              @endforeach

              </tbody>
            </table>
            <a class="btn btn-default" href="{{ url('/cuti/create') }}" role="button">Create</a>
          </div>
</div>