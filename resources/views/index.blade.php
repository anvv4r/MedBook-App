@include('layouts.header')
@include('layouts.heading')

<section class="main">
    <div class="container">
        <div class="search_bar">
            <form class="home-form" action="{{ route('search') }}" method="GET">
                <input class="home-input" type="search" name="search" id="search" placeholder="Search for more.." />
                <button class="home-button" type="submit">Search</button>
            </form>
        </div>
        <div class="search_result">
            <h3>Available Practitioners</h3>
            <div class="search_list">
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
            </div>
            <div id="doctor-list" class="search_list">
            </div>
            <button class="loadmore" id="load-more" data-page="2">Load More</button>
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