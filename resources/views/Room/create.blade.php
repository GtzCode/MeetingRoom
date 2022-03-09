@extends('layouts.app')
@section('content')

<div class='container'>
<h1>Create Room</h1>

<a type="button" class="btn btn-primary" href='/room'>Back</a>

@if($errors->any())
<div class="alert alert-danger" role="alert">
  @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
  @endforeach
</div>
@endif

<form action="/room" method="POST">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">New Room</label>
      <input type="text" class="form-control" name="NAME" value="{{ old('NAME') }}">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection