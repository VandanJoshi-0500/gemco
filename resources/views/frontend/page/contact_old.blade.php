
@extends('frontend.layouts.main')

@section('content')



    <!-- ..........ABOUT TITLE AND BREADCRUMPS.......... -->
    @include('frontend.components.dynamic-breadcrumb')
    <!-- ..........ABOUT TITLE AND BREADCRUMPS END.......... -->


    <!-- ...............CONTACT US MAIN SECTION............. -->
    <div class="container-fluid text-start py-5 d-flex justify-content-center align-items-center">
        <div class="row container d-flex justify-content-start align-items-start">
            <div class="col-md-8">
                <h1 class="mb-3">Let's connect with us</h1>
                <p class="text-muted">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and
                    scrambled it to make a type specimen book.
                </p>
            </div>
        </div>
    </div>
    <!-- ...............CONTACT US MAIN SECTION END............. -->


    <!-- ..... CONTACT FORM ..... -->
    {{-- <div class="container-fluid pb-5 d-flex align-items-center justify-content-center">
        <div class="row container d-flex align-items-center justify-content-center ContactFormContainer">
            <div class="col-md-12 bg-transparent">
                <div class="card p-4 bg-transparent contact-us-card">
                    <form id="ContactUsForm bg-transparent">
                        <div class="row mb-3 bg-transparent catalog-fields-mobile">
                            <div class="col-md-6 bg-transparent ">
                                <input type="text" class="form-control" placeholder="First Name" name="firstname"
                                    id="firstname">
                            </div>
                            <div class="col-md-6 bg-transparent">
                                <input type="text" class="form-control" placeholder="Last Name" name="lastname"
                                    id="lastname">
                            </div>
                        </div>

                        <div class="row mb-3 bg-transparent catalog-fields-mobile">
                            <div class="col-md-6 bg-transparent">
                                <input type="tel" class="form-control" placeholder="Your Phone Number" name="phonename"
                                    id="phonename">
                            </div>
                            <div class="col-md-6 bg-transparent">
                                <input type="email" class="form-control" placeholder="Your Email id" name="email"
                                    id="email">
                            </div>
                        </div>

                        <div class="row mb-3 bg-transparent catalog-fields-mobile">
                            <div class="col-md-6 bg-transparent">
                                <input type="text" class="form-control" placeholder="Software Service"
                                    name="softwareservices" id="softwareservices">
                            </div>
                            <div class="col-md-6 bg-transparent">
                                <select class="form-select" name="interest" id="interest">
                                    <option selected disabled>What are you most interested in?</option>
                                    <option value="saab">Saab</option>
                                    <option value="mercedes">Mercedes</option>
                                    <option value="audi">Audi</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <textarea class="form-control" id="message" name="message" rows="4"
                                placeholder="Message Here"></textarea>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-5 bg-transparent">
                            <div class="form-check mb-0 bg-transparent">
                                <input class="form-check-input bg-transparent" type="checkbox" id="Agree" name="Agree"
                                    value="Agree" >
                                <label class="form-check-label bg-transparent contact-us-checkbox" for="Agree">
                                    I Agree to terms & Conditions
                                </label>
                            </div>
                            <button type="submit" class="btn contact-us-btn" id="submitBtn">Let's Talk</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- ..... CONTACT FORM END..... -->


    <!-- ..........CONTACT US HEAD OFFICE ............. -->
    <div class="container-fluid text-start py-5 d-flex align-items-center justify-content-center">
        <div class="row container  d-flex align-items-center justify-content-center">
            <div class="col-md-12">
                <p class="fs-5 ">Contact us</p>
                <h1 class="">Head Office Location</h1>
            </div>
        </div>
    </div>
    <!-- ..........CONTACT US HEAD OFFICE END ............. -->


    <!-- ....CONTACT US DETAILS.... -->
    <div class="container-fluid d-flex align-items-center justify-content-center">
        <div class="row container g-4">
            <div class="col-md-6 col-lg-3 ">
                <div class="p-2 rounded d-flex align-items-start justify-content-start gap-3 ">
                    <div class="mb-3 contact-us-head-office-icon">
                        <i class="fa-solid fa-location-dot fa-2x contact-us-icon"></i>
                    </div>
                    <div class="contact-us-head-office-text">
                        <h5>Our Location</h5>
                        <p class="head-office-text">G1-15, SEZ Phase-1, RIICO Industrial Area, Sitapura, Jaipur-302022, Rajasthan (INDIA)</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="p-2 rounded d-flex align-items-center justify-content-center gap-3 ">
                    <div class="mb-3">
                        <i class="fa-solid fa-phone-volume fa-2x"></i>
                    </div>
                    <div class="">
                        <h5>Mobile Number</h5>
                        <p class="head-office-text">+91 90012 55222</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="p-2 rounded d-flex align-items-center justify-content-center gap-3 ">
                    <div class="mb-3">
                        <i class="fa-solid fa-globe fa-2x"></i>
                    </div>
                    <div class="">
                        <h5>Have Queries?</h5>
                        <p class="head-office-text">business@gemcodesigns.com</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="p-2 rounded d-flex align-items-center justify-content-center gap-3 ">
                    <div class="mb-3 bg-transparent">
                        <i class="fa-solid fa-envelope fa-2x"></i>
                    </div>
                    <div class="">
                        <h5>Contact Support</h5>
                        <p class="head-office-text">info@example.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ....CONTACT US DETAILS END.... -->



    <!-- ..............COMPANY MAP ............. -->
    <div class="CompanyMapMainContainer">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14246.421545392963!2d75.81721158715818!3d26.788846000000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396dc9a6ca13dc85%3A0x269a8d64af21de9a!2sGemco%20Designs!5e0!3m2!1sen!2sin!4v1729509998059!5m2!1sen!2sin"
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>


@endsection
