@forelse($doctors as $doctor)
    <div class="search_list_item">
        <div>
            <a href="{{ route('home.doctor', ['id' => $doctor->id]) }}">
                @if ($doctor->image == null)
                    <img src="{{ asset('img/user-profile.svg') }}" alt="{{ $doctor->name }}" />
                @else
                    <img src="{{ asset('images/' . $doctor->image) }}" alt="{{ $doctor->name }}" />
                @endif
            </a>
        </div>
        <div>
            <a href="{{ route('home.doctor', ['id' => $doctor->id]) }}">
                <h4>{{ $doctor->name }}</h4>
            </a>
            <p>{{ $doctor->specialty }}</p>
            <p>Address: {{ $doctor->address }}</p>
        </div>
    </div>
@empty
    <div>
        <p>No available doctors found.</p>
    </div>
@endforelse