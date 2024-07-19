<section class="bottom">
    <div class="bottom_container">
        <div class="bottom_container_text">
            <h2>
                Book your favourite health professional faster with the
                MedBook app
            </h2>
            <p>Available on the App Store and Google Play.</p>
            <button>Download Now</button>
        </div>
        <img src="{{ asset('img/medbook-logo.svg')}}" alt="MedBook" />
    </div>
</section>

<footer class="footer">
    <div class="footer_container">
        <div class="footer_story" id="story">
            <h2>Our Story</h2>
            MedBook is a platform that connects patients with healthcare practitioners. We aim to make healthcare more
            accessible for everyone, by giving clinics access to online bookings, appointment reminders, mobile
            check-in, online new patient and practitioner registration, and online prescription renewals. Our mission is
            to improve the health care experience for everyone.
        </div>
        <img src="{{ asset('img/blue-stet.jpg')}}" alt="MedBook" />
    </div>
    <div class="footer_copyright">
        <h3>&copy; 2024 MedBook. All rights reserved.</h3>
    </div>
</footer>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const navToggle = document.querySelector('.nav-toggle');
        const navLinks = document.querySelectorAll('nav a');
        const logo = document.querySelector('.logo');
        const nav = document.querySelector('nav');
        const header = document.querySelector('.header');

        navToggle.addEventListener('click', function () {
            navLinks.forEach(link => {
                if (link.style.display === "block") {
                    link.style.display = "none";
                } else {
                    link.style.display = "block";
                }
            });

            if (logo.style.display === 'none') {
                logo.style.display = '';
                nav.style.width = '';
                header.style.justifyContent = '';
            } else {
                logo.style.display = 'none';
                nav.style.width = '80%';
                header.style.justifyContent = 'flex-end';
            }
        });
    });
</script>
<script>
    document.getElementById("load-more").addEventListener("click", function () {
        var page = this.getAttribute("data-page");
        var button = this;
        fetch(`/search?search={{ request('search') }}&page=` + page, {
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
        })
            .then((response) => response.text())
            .then((data) => {
                document
                    .getElementById("doctor-list")
                    .insertAdjacentHTML("beforeend", data);
                var nextPage = parseInt(page) + 1;
                button.setAttribute("data-page", nextPage);
            });
    });
</script>
</body>

</html>