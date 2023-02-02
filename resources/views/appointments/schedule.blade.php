@extends('app')

@section('content')
    <h1>Appointment Schedule</h1>
    <table>
        <thead>
            <tr>
                <th>Businessperson</th>
                <th>Start Time</th>
                <th>Duration</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->businessperson }}</td>
                    <td>{{ $appointment->start_time }}</td>
                    <td>{{ $appointment->duration }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection