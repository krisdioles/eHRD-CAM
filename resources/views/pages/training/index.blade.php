@extends('app')

@include('partials.menu')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">Training</h2>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Training</th>
                  <th>Lokasi</th>
                  <th>Tanggal Training</th>
                  <th>Anggaran</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>

              @foreach($training as $training)
                <tr height="2px">
                  <td>{{ $training->idtraining }}</td>
                  <td><a href="{{ url('/training', $training->idtraining) }}">{{ $training->namatraining }}</td>
                  <td>{{ $training->lokasi }}</td>
                  <td>{{ $training->tgltraining->toDateString() }}</td>
                  <td>sit</td>
                  <td width="5">
                      <form action="{{ url('/training/'.$training->idtraining.'/edit') }}">
                          <button class="btn-xs btn-link" type="submit">Edit</button>
                      </form>
                  </td>
                  <td width="5">
                      {!! Form::open(['method' => 'DELETE', 'route' => ['training.destroy', $training->idtraining]]) !!}
                          <button class="btn-xs btn-link" type="submit">Delete</button>
                      {!! Form::close() !!}
                  </td>
                </tr>
              @endforeach

              </tbody>
            </table>
            <a class="btn btn-default" href="{{ url('/training/create') }}" role="button">Create</a>
          </div>
</div>