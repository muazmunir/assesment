@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Appointment</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('appointments.store') }}">
                        @csrf

                        <!-- Businesspeople Dropdown -->
                        <div class="form-group row">
                            <label for="businessperson_id" class="col-md-4 col-form-label text-md-right">Businessperson</label>

                            <div class="col-md-6">
                                <select id="businessperson_id" class="form-control @error('businessperson_id') is-invalid @enderror" name="businessperson_id" required autocomplete="businessperson_id">
                                    <option value="">Select Businessperson</option>
                                    @foreach($businesspeople as $businessperson)
                                        <option value="{{ $businessperson->id }}">{{ $businessperson->name }}</option>
                                    @endforeach
                                </select>

                                @error('businessperson_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Start Time -->
                        <div class="form-group row">
                            <label for="start_time" class="col-md-4 col-form-label text-md-right">Start Time</label>

                            <div class="col-md-6">
                                <input id="start_time" type="datetime-local" class="form-control @error('start_time') is-invalid @enderror" name="start_time" required autocomplete="start_time">

                                @error('start_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- End Time -->
                        <div class="form-group row">
                            <label for="end_time" class="col-md-4 col-form-label text-md-right">End Time</label>

                            <div class="col-md-6">
                                <input id="end_time" type="datetime-local" class="form-control @error('end_time') is-invalid @enderror" name="end_time" required autocomplete="end_time">

                                @error('end_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Duration -->
                        <div class="form-group row">
                            <label for="duration" class="col-md-4 col-form-label text-md-right">Duration (minutes)</label>

                            <div class="col-md-6">
                                <input id="duration" type="number" class="form-control @error('duration') is-invalid @enderror" name="duration" required autocomplete="duration">

                                @error('duration')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Create Appointment
                                </button>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>