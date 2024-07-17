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
            MedBook is a platform that connects patients with healthcare
            practitioners. We aim to make healthcare more accessible and
            affordable for everyone. We believe that everyone should
            have access to quality healthcare. We are proud to be part
            of the local community. We support local artists and
            musicians. We also host events and workshops. Lorem ipsum
            dolor sit amet, consectetur adipiscing elit. Nullam auctor,
            nunc nec
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
        const logo = document.querySelector('.logo'); // Assuming you have a logo with class 'logo'
        const nav = document.querySelector('nav'); // Assuming your navigation container has a 'nav' tag
        const header = document.querySelector('.header'); // Select the header element

        navToggle.addEventListener('click', function () {
            // Toggle navigation links visibility
            navLinks.forEach(link => {
                if (link.style.display === "block") {
                    link.style.display = "none";
                } else {
                    link.style.display = "block";
                }
            });

            // Toggle logo visibility and navigation width
            if (logo.style.display === 'none') {
                logo.style.display = 'block'; // Show the logo if it's hidden
                nav.style.width = ''; // Reset the navigation width
                header.style.justifyContent = ''; // Reset header style to default
            } else {
                logo.style.display = 'none'; // Hide the logo
                nav.style.width = '80%'; // Expand the navigation width to 80%
                header.style.justifyContent = 'flex-end'; // Change header style to justify content to the end
            }
        });
    });
</script>
</body>

</html>