@extends('layouts.app')
@section('content')

<div class='container'>
<h1>Reservation {{ $Room->NAME }}</h1>

<a type="button" class="btn btn-primary" href='/room'>Back</a>

@if($errors->any())
<div class="alert alert-danger" role="alert">
  @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
  @endforeach
</div>
@endif

<form action="/reservation" method="POST">
    @csrf
    <div class="mb-3">
        <input type="hidden" name="RoomID" value="{{ $Room->id }}" >
      <label  class="form-label">Data Begin</label>
      <input type="datetime-local" name="DataBegin" class="form-control" >
    </div>
    <div class="mb-3">
        <label  class="form-label" >Data End</label>
        <input type="datetime-local" name="DataEnd" class="form-control"  >
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection
</div>
