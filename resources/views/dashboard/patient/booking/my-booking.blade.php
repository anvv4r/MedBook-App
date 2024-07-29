@extends('dashboard.layouts.master')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3>You have {{$bookings->total()}} bookings appointment.</h3>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Doctor</th>
                                <th scope="col">Booking Date</th>
                                <th scope="col">Booking Time</th>
                                <!-- <th scope="col">Created Date</th> -->
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
                                    <td>{{$booking->doctor->name}}</td>
                                    <td>{{$booking->date}}</td>
                                    <td>{{$booking->time}}</td>
                                    <!-- <td>{{$booking->created_at}}</td> -->
                                    <td>
                                        @if($booking->status == 0)
                                            <button class="btn btn-primary">Not visited</button>
                                        @else

                                            <button class="btn btn-danger">Visited</button>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <td>You have no any appointments</td>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6">{{ $bookings->links() }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection