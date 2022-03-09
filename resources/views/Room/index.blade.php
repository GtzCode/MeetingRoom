@extends('layouts.app')
@section('content')

<div class='container'>

<h1>Rooms</h1>

<a type="button" class="btn btn-primary" href='room/create'>ADD Room</a>

<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Reservations</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
@foreach ($rooms as $room)
<tr>
    <th scope="row">{{ $room->id }}</th>
    <td>{{ $room->NAME }}</td>
    <td>
      <a type="button" class="btn btn-primary" href="/room/{{ $room->id }}/RoomReservation">Reservations</a>
     </td>
    <td>
        <a type="button" class="btn btn-primary" href="room/{{ $room->id }}/edit">Edit</a>
       </td>
    <td> <a type="button" class="btn btn-primary" href="room/{{ $room->id }}/ConfirmDelete">Delete</a>
    </td>
  </tr>
@endforeach


    </tbody>
  </table>
</div>
@endsection