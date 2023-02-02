@extends('layouts.app')

@section('content')
  <h1>Edit Calendar</h1>
  <form action="{{ route('calendars.update', $calendar->id) }}" method="post">
    @csrf
    @method('PATCH')
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" name="name" id="name" value="{{ $calendar->name }}" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
  </form>
@endsection