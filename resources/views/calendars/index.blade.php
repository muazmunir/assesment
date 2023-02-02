@extends('layouts.app')

@section('content')
    <h1>Calendar List</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Start</th>
                <th>End</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($calendars as $calendar)
                <tr>
                    <td>{{ $calendar->id }}</td>
                    <td>{{ $calendar->name }}</td>
                    <td>{{ $calendar->start }}</td>
                    <td>{{ $calendar->end }}</td>
                    <td>
                        <a href="{{ route('calendars.edit', $calendar->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('calendars.destroy', $calendar->id) }}" method="post" style="display:inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('calendars.create') }}" class="btn btn-success">Create Calendar</a>
@endsection