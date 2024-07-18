@extends('layouts.master')

@section('content')

<div class="container">
    <h3>Doctor Details</h3>
    <div class="container_detail">
        <div>
            <img src="{{asset('images')}}/{{$user->image}}" alt="{{ $user->name }}">
            <h3>{{ $user->name }}</h3>
            <p>{{ $user->specialty }}</p>
            <p>{{ $user->gender }}, {{ $user->age }} years old</p>
            <h4>Address:</h4>
            <p>{{ $user->address }}</p>

        </div>

        <div>
            <h3>Available Date</h3>
            <ul>
                @foreach($appointments as $appointment)
                    @if($appointment->date != \Carbon\Carbon::today()->toDateString())
                        <li>{{ $appointment->date }} &nbsp;&nbsp;<a class="book_button"
                                href="{{ route('booking.index', ['id' => $doctorId, 'date' => $appointment->date]) }}">Make
                                Appointment</a></li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert-danger">
            {{ session('error') }}
        </div>
    @endif
</div>

@endsection