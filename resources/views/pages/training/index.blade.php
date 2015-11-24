@extends('app')

@include('partials.menu')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">Training</h2>
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

              @foreach($train as $training)
                <tr>
                  <td>{{ $training->idtraining }}</td>
                  <td>{{ $training->namatraining }}</td>
                  <td>ipsum</td>
                  <td>dolor</td>
                  <td>sit</td>
                </tr>
              @endforeach

              </tbody>
            </table>
          </div>
</div>