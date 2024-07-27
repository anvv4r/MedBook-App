<div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Practitioner Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><img src="{{asset('images')}}/{{$user->image}}" class="table-user-thumb" alt="{{$user->name}}"
                        width="200" style="border: 2px solid #eee; border-radius: 10px;"></p>
                <p class="badge badge-pill badge-dark">{{$user->name}}</p>
                <p>{{$user->gender}}, {{$user->age}} years old.</p>
                <p>Email: {{$user->email}}</p>
                <p>Address: {{$user->address}}</p>
                <p>Phone number: {{$user->phone_number}}</p>
                <p>Specialization: {{$user->specialty}}</p>
                <p>Education: {{$user->education}}</p>
                <p>About: {{$user->description}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>