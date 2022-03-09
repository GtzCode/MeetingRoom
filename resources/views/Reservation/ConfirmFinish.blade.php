@extends('layouts.app')
@section('content')
<div class='container'>
<h1>Finish Reservation</h1>

<a type="button" class="btn btn-primary" href='/room'>Back</a>

<form action="/reservation/{{ $Reservation->id }}/finish" method="POST">
    @csrf
    @method('put')
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection