@extends('layouts.app')
@section('content')

<div class='container'>

<h1>Reservations {{ $Room->NAME }} </h1>

<a type="button" class="btn btn-primary" href='/reservation/{{ $Room->id }}'>ADD Reservation</a>

<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">DateBegin</th>
        <th scope="col">DateEnd</th>
        <th scope="col">FREE</th>
        <th scope="col">Finish</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($Reservations as $Reservation)
        <tr>
            <th scope="row">{{ $Reservation->id }}</th>
            <td>{{ $Reservation->BEGINDATE }}</td>
            <td>{{ $Reservation->ENDDATE }}</td>
            <td>{{ $Reservation->FREE ? 'TRUE' : 'FALSE'}}</td>
            <td> <a type="button" class="btn btn-primary" href="/reservation/{{ $Reservation->id }}/finish">Finish</a>
              <td> <a type="button" class="btn btn-primary" href="/reservation/{{ $Reservation->id }}/ConfirmDelete">Delete</a>
            </td>
          </tr>
        @endforeach


    </tbody>
  </table>
</div>
@endsection