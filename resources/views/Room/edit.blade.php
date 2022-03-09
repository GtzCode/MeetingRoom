@extends('layouts.app')
@section('content')

<div class='container'>
<h1>Edit Room {{ $room->id }}</h1>

<a type="button" class="btn btn-primary" href='/room'>Back</a>

<form action="/room/{{ $room->id }}" method="POST">
    @csrf
    @method('put')
    <div class="mb-3">
      <label  class="form-label">Edit Room</label>
      <input type="text" class="form-control" name="NAME" value="{{ $room->NAME }}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection
</div>