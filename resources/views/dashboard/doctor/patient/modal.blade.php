<div class="modal fade" id="userModal{{$booking->user->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    @if ($booking->user->image == null)
                        <img src="{{ asset('img') }}/user-profile.svg" class="table-user-thumb"
                            alt="{{ $booking->user->name }}" width="200"
                            style="border: 2px solid #eee; border-radius: 10px;">
                    @else
                        <img src="{{asset('images')}}/{{$booking->user->image}}" class="table-user-thumb"
                            alt="{{$booking->user->name}}" width="200" style="border: 2px solid #eee; border-radius: 10px;">
                    @endif


                </p>
                <p class="badge badge-pill badge-dark">{{$booking->user->name}}</p>
                <p>{{$booking->user->gender}}, {{$booking->user->age}} years old.</p>
                <p>Email: {{$booking->user->email}}</p>
                <p>Address:
                    @if ($booking->user->address == null)
                        <span class="text-danger">No address provided</span>
                    @else
                        {{$booking->user->address}}
                    @endif  

              </p>
                <p>Phone number: {{$booking->user->phone_number}}</p>
                <p>Date of Birth: {{$booking->user->dob}}</p>
                <p>Education:
                    @if ($booking->user->education == null)
                        <span class="text-danger">No education provided</span>
                    @else
                        {{$booking->user->education}}
                    @endif
                </p>
                <p>Bio:</p>
                <p>
                    @if ($booking->user->description == null)
                        <span class="text-danger">No bio provided</span>
                    @else
                        {{$booking->user->description}}
                    @endif
                </p>
                <div class="modal-body">
                    <h6>Booking History</h6>
                    @foreach($users as $user)
                        @if($user->bookings->isEmpty())
                            <p>No bookings found for this patient.</p>
                        @else
                            <div class="list-group">
                                @foreach($user->bookings->where('status', 1)->where('doctor_id', auth()->user()->id) as $booking)
                                    <div class="list-group-item">
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