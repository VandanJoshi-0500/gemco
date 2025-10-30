<!-- ..........FOOTER TOP BAR......... -->
{{-- <div class="container-fluid py-5 FooterTopMAinContainer">
    <div class=" container bg-transparent">
        <!-- Input Section -->
        <div class="mb-3 bg-transparent mobile-footer-topbar-mail-box">
            <div class="bg-transparent">
                <h4 class="mt-2 text-uppercase footer-topbar-newsletter">Subscribe to our newsletter</h4>
            </div>
            <div class="input-group bg-transparent inputField">
                <input type="text" class="form-control mobile-footer-topbar-mail-box-input"
                    placeholder="Enter Email Address">
                <button class="btn mobile-footer-topbar-mail-box-btn">Subscribe</button>
            </div>
        </div>
    </div>
</div> --}}
{{-- <!-- ..........NEWSLETTER......... -->
<div class="container-fluid py-5 FooterTopMAinContainer">
    <div class=" container bg-transparent">
        <!-- Input Section -->
        <div class="mb-3 bg-transparent mobile-footer-topbar-mail-box">
            <div class="bg-transparent">
                <h4 class="mt-2 text-uppercase footer-topbar-newsletter">SUBSCRIBE TO OUR NEWSLETTER</h4>
            </div>
            <form action="{{ route('newsletter') }}" method="post">
                @csrf
                <div class="input-group newsletter-input-group">
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control newsletter-input"
                        placeholder="Enter Email Address" required>
                    <button type="submit" class="btn newsletter-btn">SUBSCRIBE</button>
                </div>
                @if ($errors->has('email'))
                    <p class="text-danger mt-2">{{ $errors->first('email') }}</p>
                @endif
            </form>
        </div>
    </div>
</div> --}}
<!-- ..........FOOTER TOP BAR END......... -->


<!-- ..........MAIN FOOTER.......... -->
<footer class="FooterMainContainer pt-5 pb-0">
    <div class="container bg-transparent">
        <div class="row bg-transparent d-flex align-items-start justify-content-between">
            <!-- Contact Us -->
            <div class="col-md-4 FooterContactUSTitle bg-transparent">
                <h4 class="footerheading">Contact Us</h4>
                <ul class="list-unstyled FooterDetail bg-transparent d-flex flex-column gap-3">
                    <li class="footer-icon bg-transparent d-flex gap-3 align-items-start justify-content-start">
                        <i class="fas fa-map-marker-alt bg-transparent fs-6 px-2"></i>
                        <a href="https://maps.app.goo.gl/ZpUZpdJPEhs3CJ2G7" target="_blank">
                            <p class="w-75">
                                G1-15, SEZ Phase-1, RIICO Industrial Area, Sitapura, Jaipur-302022,Rajasthan (INDIA)
                            </p>
                        </a>
                        {{-- <p class="w-75">
                            G1-15, SEZ Phase-1, RIICO Industrial Area, Sitapura, Jaipur-302022,Rajasthan (INDIA)
                        </p> --}}
                    </li>
                    <li
                        class="footer-icon bg-transparent d-flex gap-2 align-items-center justify-content-start text-light">
                        <i class="fas fa-envelope fs-6 me-2 bg-transparent"></i>Email:
                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=business@gemcodesigns.com"
                            target="_blank"
                            class="d-flex gap-3 align-items-center justify-content-start text-light text-decoration-none w-100 bg-transparent">
                            <span class="bg-transparent">business@gemcodesigns.com</span>
                        </a>
                    </li>
                    <li
                        class="footer-icon bg-transparent d-flex gap-2 align-items-center justify-content-start text-light">
                        <i class="fas fa-phone bg-transparent fs-6 me-2"></i>Phone: <a href="tel:+91 9001255222"
                            class="bg-transparent text-light">+91 9001255222</a>

                    </li>
                </ul>
            </div>

            <!-- Our Services -->

            <!-- Quick Links -->
            <div class="col-md-2 bg-transparent">
                <h4 class="footerheading">Quick Links</h4>
                <ul class="list-unstyled bg-transparent d-flex flex-column gap-3 mt-3">
                    <li class="bg-transparent footer-our-service-list">
                        <a href="{{ url('home') }}" class="bg-transparent text-light" id="homeLink">Home</a>
                    </li>
                    <li class="bg-transparent footer-our-service-list"><a href="{{ route('about') }}"
                            class="bg-transparent text-light">About Us</a></li>
                    <li class="bg-transparent footer-our-service-list"><a href="{{ route('catalog') }}"
                            class="bg-transparent text-light">Request Catalog</a></li>
                </ul>
            </div>

            <!-- Logo & Social Media -->
            <div class="col-md-4 text-start bg-transparent">
                <h4 class="footerheading">Follow Us</h4>
                {{-- <img src="{{ url('frontend/Assets/blacklogo.png') }}" alt="Logo" width="140" height="70"
                    class="mb-3 bg-transparent">
                <p class="footer-our-service-list">Lorem Ipsum is simply dummy text of the printing and typesetting
                    industry. Lorem Ipsum has been
                    the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                    of type and scrambled it to make a type specimen book.</p> --}}
                <div class="bg-transparent">
                    <a href="https://www.instagram.com/gemco_designs/" target="_blank" class="bg-transparent me-2"><i
                            class="fab text-dark bg-transparent fa-instagram"></i></a>
                    <a href="https://www.facebook.com/Gemcodesignsjewelry" target="_blank"
                        class="bg-transparent me-2"><i class="fab text-dark bg-transparent fa-facebook-f"></i></a>
                    <a href="https://wa.me/9001255222" target="_blank" class="bg-transparent me-2"><i
                            class="fab text-dark bg-transparent fa-whatsapp"></i></a>
                    <!-- <a href="#" class="bg-transparent me-2"><i
                            class="fab text-dark bg-transparent fa-twitter"></i></a>
                    <a href="#" class="bg-transparent me-2"><i
                            class="fab text-dark bg-transparent fa-threads"></i></a> -->
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ..........MAIN FOOTER END.......... -->


<!-- ..........COPY RIGHT SECTION........... -->
<div class="container-fluid py-3 CopyRightMainContainer text-center">
    <div class="container bg-transparent">
        <!-- Horizontal line at the top -->
        <hr class="CopyRightLine">

        <!-- Centered content -->
        <p class="mb-0 mx-auto bg-transparent">Copyright © 2025 Gemcodesigns. All Rights Reserved.</p>
    </div>
</div>
{{-- <div class="container-fluid text-center py-3 CopyRightMainContainer ">
    <div class="container bg-transparent">
        <hr class="CopyRightLine">
        <div class="container d-flex justify-content-between align-items-center bg-transparent">
            <p class="mb-1 bg-transparent">Copyright © 2025 Gemcodesigns. All Rights Reserved.</p>
            <p class="mb-0 bg-transparent">Designed & Developed by <a href="https://www.repletesoftware.com/"
                    target="_blank" rel="nofollow" class="text-decoration-none bg-transparent text-dark">Replete
                    Software Pvt Ltd.</a></p>
        </div>
    </div>
</div> --}}
<!-- ..........COPY RIGHT SECTION END........... -->



</body>


{{-- for alert to newsletter --}}

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('subscribe'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'success',
            text: '{{ session('subscribe') }}',
            confirmButtonColor: '#6c63ff',
            confirmButtonText: 'OK',
            // Manually inject checkmark if it's not rendering properly
            iconHtml: '<svg aria-hidden="true" class="swal2-icon-success__svg" width="80" height="80" viewBox="0 0 80 80"><path fill="none" stroke="#a5dc86" stroke-width="5" d="M26 39l14 14 28-28"></path></svg>',
            customClass: {
                icon: 'swal2-icon-custom'
            }
        });
    </script>
@endif

<!-- .......SCRIPT FOR ALL PAGES...... -->
<script src="{{ url('frontend/js/script.js') }}"></script>


<!-- FONTAWESOME SCRIPT -->
<script src="https://kit.fontawesome.com/3f158b2d89.js" crossorigin="anonymous"></script>


<script src="{{ url('frontend/js/Counter.js') }}"></script>

{{-- productlisting page js start --}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<!-- .......SCRIPT FOR DATA LISTING...... -->
<script src="{{ url('frontend/js/ProductListData.js') }}"></script>


<!-- FONTAWESOME SCRIPT -->
<script src="https://kit.fontawesome.com/3f158b2d89.js" crossorigin="anonymous"></script>
<script>
    const rangeInput = document.getElementById("customRange");

    function updateRangeBar() {
        const min = rangeInput.min;
        const max = rangeInput.max;
        const val = rangeInput.value;

        const percentage = ((val - min) / (max - min)) * 100;

        rangeInput.style.background =
            `linear-gradient(to right, black 0%, black ${percentage}%, white ${percentage}%, white 100%)`;
    }

    rangeInput.addEventListener("input", updateRangeBar);

    // Initialize on page load
    updateRangeBar();

    // productlisting page js end


    //jwellery page js start here
    const rangeInput = document.getElementById("customRange");

    function updateRangeBar() {
        const min = rangeInput.min;
        const max = rangeInput.max;
        const val = rangeInput.value;

        const percentage = ((val - min) / (max - min)) * 100;

        rangeInput.style.background =
            `linear-gradient(to right, black 0%, black ${percentage}%, white ${percentage}%, white 100%)`;
    }

    rangeInput.addEventListener("input", updateRangeBar);

    // Initialize on page load
    updateRangeBar();

    //jwellery page js ends here

    //catalog page js
    <
    script src = "{{ url('frontend/js/RequestCatalog.js') }}" >
</script>



<!-- contact us page js -->
<script src="{{ url('frontend/js/ContactUs.js') }}"></script>
<script>
    function enableBTN() {
        document.getElementById("submitBtn").disabled = !document.getElementById("Agree").checked;
    }
</script>

<!-- productdetailpage -->
<script src="{{ url('frontend/js/ProductDetail.js') }}"></script>
<script>
    function switchImage(src) {
        document.getElementById('mainImage').src = src;
    }
</script>

<!-- contactus page js-->
<script src="{{ url('frontend/js/ContactUs.js') }}"></script>
<script>
    function enableBTN() {
        document.getElementById("submitBtn").disabled = !document.getElementById("Agree").checked;
    }
</script>

{{-- Slick slider --}}
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>

{{-- MULTIPLE IMAGES FOR PRODUCT DETAIL PAGE --}}
<script>
    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'
    });
    $('.slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: true,
        centerMode: true,
        focusOnSelect: true
    });
</script>


{{-- SEARCH SCRIPT HEADER --}}
<script>
    document.getElementById('openSearch').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('searchPopup').classList.remove('d-none');
    });

    document.querySelector('.close-search').addEventListener('click', function() {
        document.getElementById('searchPopup').classList.add('d-none');
    });

    // Optional: close popup on ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === "Escape") {
            document.getElementById('searchPopup').classList.add('d-none');
        }
    });
</script>



<!-- SHOP BY CATEGORY -->
<script>
    $(document).ready(function() {
        $('.category-slider').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });
    });
</script>

<!-- TESTIMONIALS  -->
<script>
    $(document).ready(function() {
        $('.review-slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: true,
            dots: false,
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });
    });
</script>





<!-- JQUERY CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- SLICK SLIDER CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
    integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>



{{-- script for homepage scrolling instead of loading when click on footer home page --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const homeLink = document.getElementById('homeLink');

        if (homeLink) {
            homeLink.addEventListener('click', function(e) {
                const isHomePage = window.location.pathname === '{{ route('home', [], false) }}';

                if (isHomePage) {
                    e.preventDefault(); // Prevent reload
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                }
                // else, let the default behavior proceed (navigating to homepage)
            });
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const homeLink = document.getElementById('homeLink');

        if (homeLink) {
            homeLink.addEventListener('click', function(e) {
                // Match current page path exactly (e.g., "/gemco/home")
                const currentPath = window.location.pathname;
                const homePath = "{{ url('home') }}".replace(window.location.origin, '');

                if (currentPath === homePath) {
                    e.preventDefault(); // Prevent navigation
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                }
                // If not on home, default behavior will redirect to home
            });
        }
    });
</script>
{{-- script for homepage scrolling instead of loading when click on footer home page ends here --}}

{{-- script for homepage scrolling instead of loading when click on footer home page ends here --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        fetch("{{ route('wishlist.count') }}")
            .then(response => response.json())
            .then(data => {
                document.querySelector('.wishlist-count').textContent = data.wishlistcount;
            })
            .catch(error => {
                console.error('Error fetching wishlist count:', error);
            });
    });
</script>


{{-- <script>
    $(document).ready(function() {

        loadwishlist();


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function loadwishlist() {
            $.ajax({
                method: "GET",
                url: "/load-wishlist-count",

                success: function(response) {
                    $('.wishlist-count').html('');
                    $('.wishlist-count').html(response.count);
                }

            });
        }

    });
</script> --}}

@yield('script')




</html>
