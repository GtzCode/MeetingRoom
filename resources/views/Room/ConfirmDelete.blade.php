@extends('layouts.app')
@section('content')
<div class='container'>
<h1>Delete Room {{ $room->id }}</h1>

<a type="button" class="btn btn-primary" href='/room'>Back</a>

<form action="/room/{{ $room->id }}" method="POST">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-primary">Delete</button>
  </form>
</div>
@endsection