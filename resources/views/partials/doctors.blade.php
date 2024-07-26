@forelse($practitioners as $practitioner)
    <div class="search_list_item">
        <div>
            <a href="{{ route('home.doctor', ['id' => $practitioner->id]) }}">
                @if ($practitioner->image == null)
                    <img src="{{ asset('img/user-profile.svg') }}" alt="{{ $practitioner->name }}" />
                @else
                    <img src="{{ asset('images/' . $practitioner->image) }}" alt="{{ $practitioner->name }}" />
                @endif
            </a>
        </div>
        <div>
            <a href="{{ route('home.doctor', ['id' => $practitioner->id]) }}">
                <h4>{{ $practitioner->name }}</h4>
            </a>
            <p>{{ $practitioner->specialty }}</p>
            <h4>Address:</h4>
            <p>{{ $practitioner->address }}</p>
        </div>
    </div>
@empty
    <div class="search_list">
        <p>No available practitioner found.</p>
    </div>
@endforelse