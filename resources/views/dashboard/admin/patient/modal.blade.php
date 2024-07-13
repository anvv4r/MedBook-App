<div class="modal fade" id="userModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Patient information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

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
                <p>Email: {{$user->email}}</p>
                <p>Address: {{$user->address}}</p>
                <p>Phone number: {{$user->phone_number}}</p>
                <p>Date of Birth: {{$user->dob}}</p>
                <div class="modal-body">
                    <h6>Booking History</h6>
                    @foreach($users as $user)
                        @if($user->bookings->isEmpty())
                            <p>No bookings found for this patient.</p>
                        @else
                            <div class="list-group">
                                @foreach($user->bookings->where('status', 1) as $booking)
                                    <div class="list-group-item">
                                        <div>Doctor: {{ $booking->doctor->name }}</div>
                                        <div>Booking Date: {{ $booking->date }}</div>
                                        <div>Booking Time: {{ $booking->time }}</div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>