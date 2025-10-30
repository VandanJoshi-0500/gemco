@extends('frontend.layouts.main')

@section('content')
    <!-- ..........ABOUT TITLE AND BREADCRUMPS.......... -->
    @include('frontend.components.dynamic-breadcrumb')
    <!-- ..........ABOUT TITLE AND BREADCRUMPS END.......... -->


    <!-- ...............CONTACT US MAIN SECTION............. -->
    <div class="container contact-section bg-transparent">
        {{-- <h2 class="text-center mb-5 bg-transparent">CONTACT US</h2> --}}
        <div class="row bg-transparent">
            <!-- Contact Details -->
            <div class="col-md-6 bg-transparent left-side-main-container ">
                <div class="contact-us-left-side-details-section bg-transparent pb-3">
                    <div class="bg-transparent w-50">
                        <a href="https://maps.app.goo.gl/ZpUZpdJPEhs3CJ2G7" target="_blank" class="bg-transparent contact-us-icons-container w-100"> <i
                                class="fa-solid fa-location-dot contact-icon"></i>
                            <p> G1-15, SEZ Phase-1, RIICO Industrial Area, Sitapura, Jaipur-302022, Rajasthan (INDIA)</p>
                        </a>
                    </div>
                    <div class="bg-transparent ">
                        <a href="tel:+91 9001255222" class="contact-us-icons-container"><i
                                class="fa fa-phone contact-icon"></i>
                            <span>+91 9001255222</span>
                        </a>
                        <a class="contact-us-icons-container"><i class="fa fa-clock contact-icon"></i>
                            <p>Mon – Fri / 10:00 AM to 7:00 PM</p>
                        </a>

                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=business@gemcodesigns.com" 
                            target="_blank"
                            class="contact-us-icons-container bg-transparent text-dark">
                            <i class="fa-solid fa-envelope contact-icon"></i>
                            <span>business@gemcodesigns.com</span>
                        </a>
                    </div>
                </div>
                <!-- Google Map -->
                <div class="map-responsive bg-transparent mt-5">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14246.421545392963!2d75.81721158715818!3d26.788846000000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396dc9a6ca13dc85%3A0x269a8d64af21de9a!2sGemco%20Designs!5e0!3m2!1sen!2sin!4v1729509998059!5m2!1sen!2sin"
                        width="100%" height="550" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <!-- Vertical Divider -->
            <div class="col-md-1 d-none d-md-flex justify-content-center bg-transparent">
                <div style="border-left: 1px solid #000000; height: 100%;"></div>
            </div>
            <!-- Contact Form -->
            <div class="col-md-5 bg-transparent">
                @if (session('submitted'))
                    <div class="alert alert-success">
                        {{ session('submitted') }}
                    </div>
                @endif
                <form class=" mt-5" action="{{ route('submit.contact.form') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Your Name *" required>
                        @if ($errors->has('name'))
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                        @endif
                        {{-- <input type="text" class="form-control" placeholder="Your Name *" required> --}}
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email Address *"
                            aria-label="Email" required>
                        @if ($errors->has('email'))
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        @endif
                        {{-- <input type="email" class="form-control" placeholder="Email Address *" required> --}}
                    </div>
                    <div class="mb-3">
                        <textarea name="message" id="" cols="30" rows="7" placeholder="Message *" class="form-control"
                            required></textarea>
                        @if ($errors->has('message'))
                            <p class="text-danger">{{ $errors->first('message') }}</p>
                        @endif
                        {{-- <textarea class="form-control" rows="6" placeholder="Message *" required></textarea> --}}
                    </div>
                    <button type="submit" class="btn submit-btn register-btn">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('#reload').click(function() {
            $.ajax({
                type: 'GET',
                url: '{{ route('reload-captcha') }}',
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    </script>
@endsection
