@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $calendar->name }}</div>

                <div class="card-body">
                    <p><strong>Start Time:</strong> {{ $calendar->start }}</p>
                    <p><strong>End Time:</strong> {{ $calendar->end }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection