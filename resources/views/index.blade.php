@include('layouts.header')
@include('layouts.heading')

<section class="main">
    <div class="container">
        <div class="search_bar">
            <input type="search" name="" id="" /><button>Search</button>
        </div>
        <div class="search_result">
            <h3>Available Doctors</h3>
            <div class="search_list">
                @forelse($availableDoctors as $doctor)
                    <div class="search_list_item">
                        <a href="{{ route('home.doctor', ['id' => $doctor->id]) }}">
                            @if ($doctor->image == null)
                                <img src="{{ asset('img/user-profile.svg') }}" alt="{{ $doctor->name }}" />
                            @else
                                <img src="{{ asset('images/' . $doctor->image) }}" alt="{{ $doctor->name }}" />

                            @endif
                        </a>
                        <a href="{{ route('home.doctor', ['id' => $doctor->id]) }}">
                            <h4>{{ $doctor->name }}</h4>
                        </a>
                        <p>{{ $doctor->specialty }}</p>
                        <p>Address: {{ $doctor->address }}</p>
                    </div>
                @empty
                    <div>
                        <p>No available doctors found.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>
<section class="mid">
    <td class="mid_container_text">
        <h3>
            Are you a GP, dentist or specialist?
        </h3>
        <a href="/register-doctor" class="mid_button">List Your Practice at MedBook</a>
    </td>
</section>

@include('layouts.footer')