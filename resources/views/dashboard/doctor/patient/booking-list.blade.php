@extends('dashboard.layouts.master')
@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">

            <div class="page-header-title">
                <i class="ik ik-command bg-blue"></i>
                <div class="d-inline">
                    <h5>Patient Appointments</h5>
                    <span>List</span>

                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/doctor/dashboard"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="/doctor/patient">Patient Appointments</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List</li>
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
                    <h3>You have {{$bookings->total()}} Patient appointments.</h3>
                </div>
                <form action="{{route('patient.booking-list')}}" method="GET">

                    <div class="card-header">
                        Filter by Date :&nbsp;
                        <div class="row">
                            <div class="col-md-10">
                                <input type="text" class="form-control datetimepicker-input" id="bookdatepicker"
                                    data-toggle="datetimepicker" data-target="#bookdatepicker" name="date">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>

                    </div>
                </form>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Patient Name</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $perPage = $bookings->perPage();
                                $currentPage = $bookings->currentPage();
                                $startingIndex = ($currentPage - 1) * $perPage;
                            @endphp
                            @forelse($bookings as $key => $booking)
                                <tr>
                                    <th scope="row">{{ $startingIndex + $key + 1 }}</th>
                                    <td><a href="#" data-toggle="modal" data-target="#userModal{{$booking->user->id}}">
                                            <strong>{{$booking->user->name}}</strong>
                                        </a></td>
                                    <td>{{$booking->user->gender}}</td>
                                    <td>{{$booking->user->email}}</td>
                                    <td>{{$booking->user->phone_number}}</td>
                                    <td>{{$booking->date}}</td>
                                    <td>{{$booking->time}}</td>
                                    <td>
                                        @if($booking->status == 0)
                                            <a href="{{route('update.status', [$booking->id])}}"><button
                                                    class="btn btn-primary">Pending</button></a>
                                        @else 

                                            <a href="{{route('update.status', [$booking->id])}}"><button
                                                    class="btn btn-danger">Checked</button></a>
                                        @endif
                                    </td>
                                </tr>
                                @include('dashboard.doctor.patient.modal')

                            @empty
                                <tr>
                                    <td colspan="8">There are no appointments!</td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="8">{{ $bookings->links() }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection