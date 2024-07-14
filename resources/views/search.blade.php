@include('layouts.header')
@include('layouts.heading')

<section class="main">
    <div class="container" id="root">
    </div>
    @viteReactRefresh
    @vite('resources/js/main.jsx')
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