@extends('dashboard.layouts.master')
@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-command bg-blue"></i>
                <div class="d-inline">
                    <h5>Patient Detail</h5>
                    <span>Information</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/admin/dashboard"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="/admin/patient/list">Patient</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Patient Information</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3>Patient Information</h3>
                </div>
                <div class="card-body">
                    <p>
                        @if ($user->image == null)
                            <img src="{{ asset('img') }}/user-profile.svg" class="table-user-thumb" alt="{{ $user->name }}"
                                width="200" style="border: 2px solid #eee; border-radius: 10px;">
                        @else
                            <img src="{{asset('images')}}/{{$user->image}}" class="table-user-thumb" alt="{{$user->name}}"
                                width="200" style="border: 2px solid #eee; border-radius: 10px;">
                        @endif
                    </p>
                    <p class="badge badge-pill badge-dark">{{$user->name}}</p>
                    <p>{{$user->gender}}, {{$user->age}} years old.</p>
                    <p>Date of Birth: {{$user->dob}}</p>
                    <p>Email: {{$user->email}}</p>
                    <p>Phone number: {{$user->phone_number}}</p>
                    <p>Address:
                        @if ($user->address == null)
                            Not Provided
                        @else
                            {{$user->address}}
                        @endif
                    </p>
                    <p>Education:
                        @if ($user->education == null)
                            Not Provided
                        @else
                            {{$user->education}}
                        @endif
                    </p>
                    <p>Bio:</p>
                    <p>
                        @if ($user->description == null)
                            Not Provided
                        @else
                            {{$user->description}}
                        @endif
                    </p>
                    <div class="card-body">
                        <h6>Booking History</h6>
                        @if($bookings->isEmpty())
                            <div class="alert alert-warning">No booking history found.</div>
                        @else
                            <div class="list-group">
                                @foreach($bookings as $booking)
                                    <div class="list-group-item">
                                        <div>Practitioner: {{ $booking->doctor->name }}</div>
                                        <div>Booking Date: {{ $booking->date }}</div>
                                        <div>Booking Time: {{ $booking->time }}</div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <a href="{{route('patient.patient-list')}}" class="btn btn-primary">Close</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection