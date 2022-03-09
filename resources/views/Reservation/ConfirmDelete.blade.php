@extends('layouts.app')
@section('content')
<div class='container'>
<h1>Delete Reservation</h1>

<a type="button" class="btn btn-primary" href='/room'>Back</a>

<form action="/reservation/{{ $Reservation->id }}" method="POST">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-primary">Delete</button>
  </form>
</div>
@endsection