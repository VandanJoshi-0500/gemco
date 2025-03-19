
@extends('frontend.layouts.main')

@section('content')

    <!-- .....BANNER SECTION..... -->
    <div class="container-fluid p-0">
        <div class="hero-section text-center">
            <img src="{{url('frontend/Assets/HeroBanner.png')}}" class="img-fluid w-100" alt="Hero Banner">
        </div>
    </div>
    <!-- .....BANNER SECTION END..... -->


    <!-- ......SHOP BY COLLECTION SECTION...... -->
    <div class="container-fluid py-1">
        <div class="container">
            <div class="text-center mb-4 DealBTN">
                <button class="btn"
                    style="border-radius: 20px; color: black; background-color: #F5E7D6; padding: 10px 70px; border: none;">
                    We Deal With Our Categories
                </button>
            </div>
            <div class="text-center mb-4 CollectionTitle">
                <h2>Shop By Collections</h2>
            </div>
            <div class="row g-4">
                <div class="col-6 col-md-4 col-lg-2">
                    <img src="{{url('frontend/Assets/HomeCollection/HomeCollection1.png')}}" class="img-fluid" alt="Product 1">
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <img src="{{url('frontend/Assets/HomeCollection/HomeCollection2.png')}}" class="img-fluid" alt="Product 2">
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <img src="{{url('frontend/Assets/HomeCollection/HomeCollection3.png')}}" class="img-fluid" alt="Product 3">
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <img src="{{url('frontend/Assets/HomeCollection/HomeCollection4.png')}}" class="img-fluid" alt="Product 4">
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <img src="{{url('frontend/Assets/HomeCollection/HomeCollection5.png')}}" class="img-fluid" alt="Product 5">
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <img src="{{url('frontend/Assets/HomeCollection/HomeCollection6.png')}}" class="img-fluid" alt="Product 6">
                </div>
            </div>
        </div>
    </div>
    <!-- ......SHOP BY COLLECTION SECTION END...... -->


    <!-- .....HOME PAGE ABOUT SECTION..... -->
    <div class="container-fluid pt-5 d-flex align-items-center justify-content-center">
        <div class="container py-5 row align-items-center">
            <!-- Image Section -->
            <div class="col-md-6 text-center">
                <img src="{{url('frontend/Assets/HomePageABTIMG/HomeAboutIMG.png')}}" class="img-fluid" alt="About Gemcodesigns"
                    width="500" height="400">
            </div>

            <!-- Content Section -->
            <div class="col-md-6 d-flex align-items-start flex-column boutContentSection">
                <p class="AboutContentSectionTitle">ABOUT GEMCODESIGNS</p>
                <h2 class="AboutContentSectionHeader">This is custom heading element</h2>
                <p class="AboutContentSectionContent">Customization of jewelry to make it personalize for you. Jewelry
                    Manufacturing and Betsafe PL is a matter of creativity. First of all the design comes in the mind
                    then a blueprint of that design is drawn on paper. Moreover, it is a kind of assembling and jointing
                    various gold parts like small balls, gold leaves, wire, etc.</p>
                <a href="#" class="btn btn-primary AboutBTN">Know More <i class="fa-solid fa-arrow-right ms-2"></i></a>
            </div>
        </div>
    </div>
    <!-- .....HOME PAGE ABOUT SECTION END..... -->


    <!-- ......LIMITED TIME SECTION...... -->
    <div class="container-fluid pt-5 text-center d-flex align-items-center justify-content-center">
        <div class="row justify-content-center LimitedMainContainer">
            <div class="col-md-12 container bg-transparent">
                <div class="d-flex flex-wrap align-items-center justify-content-between bg-transparent">
                    <div class=" d-flex align-items-start flex-column bg-transparent">
                        <p class=" text-white">Limited Time</p>
                        <h2 class="text-white bg-transparent">Deal Expire Soon!</h2>
                    </div>
                    <div class="d-flex justify-content-center align-items-center mt-4 bg-transparent flex-wrap">
                        <div class="text-center mx-3 bg-transparent">
                            <p class="text-white fs-2 fw-bold mb-0 bg-transparent">78</p>
                            <p class="text-white bg-transparent">Days</p>
                        </div>
                        <div class="vr mx-2"></div>
                        <div class="text-center mx-3 bg-transparent">
                            <p class="text-white fs-2 fw-bold mb-0 bg-transparent">64</p>
                            <p class="text-white bg-transparent">Hours</p>
                        </div>
                        <div class="vr mx-2"></div>
                        <div class="text-center mx-3 bg-transparent">
                            <p class="text-white fs-2 fw-bold mb-0 bg-transparent">59</p>
                            <p class="text-white bg-transparent">Minutes</p>
                        </div>
                        <div class="vr mx-2"></div>
                        <div class="text-center mx-3 bg-transparent">
                            <p class="text-white fs-2 fw-bold mb-0 bg-transparent">32</p>
                            <p class="text-white bg-transparent">Seconds</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ......LIMITED TIME SECTION END...... -->



    <!-- ......VIDEO AND CONTENT SECTION...... -->
    <div class="container-fluid d-flex align-items-center justify-content-center py-5 VideoMainContainer">
        <div class="container row d-flex align-items-center justify-content-between bg-transparent">
            <!-- Video Section -->
            <div class="col-md-6 bg-transparent">
                <video width="100%" height="auto" controls poster="./Assets/HomePageABTIMG/VideoPlaceholderIMG.jpg" class="img-fluid">
                    <source src="{{url('frontend/Assets/Video/HomePageVideo.mp4')}}" type="video/mp4">
                    <source src="{{url('frontend/Assets/Video/HomePageVideo.mp4')}}" type="video/ogg">
                    Your browser does not support the video tag.
                </video>
            </div>

            <!-- Content Section -->
            <div class="col-md-6 bg-transparent">
                <p class="">Enquire Custom Piece</p>
                <h2 class="bg-transparent VideoContentSectionHeader">Jewels Are Often Crafted Into Journey into a Realm Various point Rings, Necklaces, Earrings.</h2>
                <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.</p>
                <a href="#" class="btn VideoBTN">Know More <i class="fa-solid fa-arrow-right ms-2"></i></a>
            </div>
        </div>
    </div>
    <!-- ......VIDEO AND CONTENT SECTION END...... -->



    <!-- ......OUR NEW COLLECTION SECTION...... -->
    <div class="container-fluid py-5 d-flex justify-content-center align-items-center flex-column">
        <div class="text-center mb-4">
            <button class="btn px-5 py-2 rounded-pill DealBTN">Glamorous Life</button>
        </div>
        <div class="text-center mb-4 ">
            <h2>Our new Collections</h2>
        </div>
        <div class="row container d-flex justify-content-center align-items-center">
            <div class="col-md-3 mb-4 ">
                <div class="card border-0 shadow-sm position-relative bg-white">
                    <img src="{{url('frontend/Assets/ProductListIMGs/GoldRing.png')}}" class="card-img-top product-list-product-img p-2 bg-white image-fluid" alt="Jacinth Gold Ring">
                    <div class="card-body text-center">
                        <p class="text-center product-list-title">Romantic Florals</p>
                        <h5>Jacinth Gold Ring</h5>
                        <div class="d-flex gap-2 mt-3 product-list-btns d-flex justify-content-around">
                            <a class="btn send-enquiry">Send Enquiry</a>
                            <a class="btn quick-view">Quick View</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4 ">
                <div class="card border-0 shadow-sm position-relative bg-white">
                    <img src="{{url('frontend/Assets/ProductListIMGs/GoldRing.png')}}" class="card-img-top product-list-product-img p-2 bg-white image-fluid" alt="Jacinth Gold Ring">
                    <div class="card-body text-center">
                        <p class="text-center product-list-title">Romantic Florals</p>
                        <h5>Jacinth Gold Ring</h5>
                        <div class="d-flex gap-2 mt-3 product-list-btns d-flex justify-content-around">
                            <a class="btn send-enquiry">Send Enquiry</a>
                            <a class="btn quick-view">Quick View</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4 ">
                <div class="card border-0 shadow-sm position-relative bg-white">
                    <img src="{{url('frontend/Assets/ProductListIMGs/GoldRing.png')}}" class="card-img-top product-list-product-img p-2 bg-white image-fluid" alt="Jacinth Gold Ring">
                    <div class="card-body text-center">
                        <p class="text-center product-list-title">Romantic Florals</p>
                        <h5>Jacinth Gold Ring</h5>
                        <div class="d-flex gap-2 mt-3 product-list-btns d-flex justify-content-around">
                            <a class="btn send-enquiry">Send Enquiry</a>
                            <a class="btn quick-view">Quick View</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4 ">
                <div class="card border-0 shadow-sm position-relative bg-white">
                    <img src="{{url('frontend/Assets/ProductListIMGs/GoldRing.png')}}" class="card-img-top product-list-product-img p-2 bg-white image-fluid" alt="Jacinth Gold Ring">
                    <div class="card-body text-center">
                        <p class="text-center product-list-title">Romantic Florals</p>
                        <h5>Jacinth Gold Ring</h5>
                        <div class="d-flex gap-2 mt-3 product-list-btns d-flex justify-content-around">
                            <a class="btn send-enquiry">Send Enquiry</a>
                            <a class="btn quick-view">Quick View</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ......OUR NEW COLLECTION SECTION END...... -->


    <!-- ........DISCOUNT SECTION......... -->
    <div class="container-fluid py-5 d-flex align-items-center justify-content-center">
        <div class="row g-4 container">
            <div class="col-md-6">
                <div class="card discount-card">
                    <img src="{{url('frontend/Assets/DiscountIMGs/Discount1.png')}}" alt="Alexander Jewelers">
                    <div class="discount-overlay ">
                        <h1 class="card-title text-white bg-transparent">20% Off</h1>
                        <h3 class="card-subtitle mb-3 bg-transparent">Alexander Jewelers</h3>
                        <a href="#" class="btn DiscountBTN">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card discount-card">
                    <img src="{{url('frontend/Assets/DiscountIMGs/Discount1.png')}}" alt="Alexander Jewelers">
                    <div class="discount-overlay ">
                        <h1 class="card-title text-white bg-transparent">10% Off</h1>
                        <h3 class="card-subtitle mb-3 bg-transparent">Handcrafted sparkle Rings</h3>
                        <a href="#" class="btn DiscountBTN">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ........DISCOUNT SECTION END......... -->


    <!-- ........HAPPY STORIES SECTION......... -->
    <div class="container-fluid py-5 d-flex align-items-center justify-content-center flex-column">
        <h2 class="text-center mb-4">Where Happy Stories</h2>

        <div class="row container ">
            <!-- Review Card -->
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm p-4">
                    <div class="mb-2 bg-transparent">
                        <i class="fa-solid fa-star text-warning bg-transparent"></i>
                        <i class="fa-solid fa-star text-warning bg-transparent"></i>
                        <i class="fa-solid fa-star text-warning bg-transparent"></i>
                        <i class="fa-solid fa-star text-warning bg-transparent"></i>
                        <i class="fa-solid fa-star text-warning bg-transparent"></i>
                    </div>
                    <div class="card-body bg-transparent">
                        <p class="card-text bg-transparent">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                        </p>
                    </div>
                    <div class="d-flex align-items-center bg-transparent">
                        <img src="{{url('frontend/Assets/StoriesIMGs/UserIMG.png')}}" width="60" height="60" class="rounded-circle me-3" alt="User">
                        <div class="bg-transparent">
                            <p class="mb-1 bg-transparent">Dazzling dames</p>
                            <p class="mb-0 bg-transparent">- Kimberly Joe <span class="bg-transparent">Los Angeles, CA</span></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm p-4">
                    <div class="mb-2 bg-transparent">
                        <i class="fa-solid fa-star text-warning bg-transparent"></i>
                        <i class="fa-solid fa-star text-warning bg-transparent"></i>
                        <i class="fa-solid fa-star text-warning bg-transparent"></i>
                        <i class="fa-solid fa-star text-warning bg-transparent"></i>
                        <i class="fa-solid fa-star text-warning bg-transparent"></i>
                    </div>
                    <div class="card-body bg-transparent">
                        <p class="card-text bg-transparent">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                        </p>
                    </div>
                    <div class="d-flex align-items-center bg-transparent">
                        <img src="{{url('frontend/Assets/StoriesIMGs/UserIMG.png')}}" width="60" height="60" class="rounded-circle me-3" alt="User">
                        <div class="bg-transparent">
                            <p class="mb-1 bg-transparent">Dazzling dames</p>
                            <p class="mb-0 bg-transparent">- Kimberly Joe <span class="bg-transparent">Los Angeles, CA</span></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm p-4">
                    <div class="mb-2 bg-transparent">
                        <i class="fa-solid fa-star text-warning bg-transparent"></i>
                        <i class="fa-solid fa-star text-warning bg-transparent"></i>
                        <i class="fa-solid fa-star text-warning bg-transparent"></i>
                        <i class="fa-solid fa-star text-warning bg-transparent"></i>
                        <i class="fa-solid fa-star text-warning bg-transparent"></i>
                    </div>
                    <div class="card-body bg-transparent">
                        <p class="card-text bg-transparent">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                        </p>
                    </div>
                    <div class="d-flex align-items-center bg-transparent">
                        <img src="{{url('frontend/Assets/StoriesIMGs/UserIMG.png')}}" width="60" height="60" class="rounded-circle me-3" alt="User">
                        <div class="bg-transparent">
                            <p class="mb-1 bg-transparent">Dazzling dames</p>
                            <p class="mb-0 bg-transparent">- Kimberly Joe <span class="bg-transparent">Los Angeles, CA</span></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- ........HAPPY STORIES SECTION END......... -->


    <!-- .......INSTAGRAM UNIVERSE......... -->
    <div class="container-fluid text-center py-5 d-flex align-items-center justify-content-center flex-column instgramMainContainer">
        <div class="row container  py-3 d-flex align-items-center justify-content-center flex-column bg-transparent">
            <div class="col-12 bg-transparent">
                <h2 class="bg-transparent">Explore the Instagram Universe!</h2>
            </div>
            <div class="col-12 bg-transparent">
                <p class="text-center bg-transparent">Phasellus non ullamcorper ipsum. Donec a neque sodales, porttitor arcu eu, venenatis turpis. Pellentesqueam</p>
            </div>
        </div>

        <!-- Instagram Gallery -->
        <div class="row container g-4 justify-content-center bg-transparent">
            <div class="col-md-3 col-sm-6 bg-transparent">
                <div class="position-relative">
                    <img src="{{url('frontend/Assets/InstagramUniverse/Instagram1.png')}}" class="img-fluid" alt="Instagram Image">
                    <div class="position-absolute top-50 start-50 translate-middle bg-transparent">
                        <i class="fab fa-instagram text-white fs-3 bg-transparent"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 bg-transparent">
                <div class="position-relative">
                    <img src="{{url('frontend/Assets/InstagramUniverse/Instagram2.png')}}" class="img-fluid" alt="Instagram Image">
                    <div class="position-absolute top-50 start-50 translate-middle bg-transparent">
                        <i class="fab fa-instagram text-white fs-3 bg-transparent"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 bg-transparent">
                <div class="position-relative">
                    <img src="{{url('frontend/Assets/InstagramUniverse/Instagram3.png')}}" class="img-fluid" alt="Instagram Image">
                    <div class="position-absolute top-50 start-50 translate-middle bg-transparent">
                        <i class="fab fa-instagram text-white fs-3 bg-transparent"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 bg-transparent">
                <div class="position-relative">
                    <img src="{{url('frontend/Assets/InstagramUniverse/Instagram4.png')}}" class="img-fluid" alt="Instagram Image">
                    <div class="position-absolute top-50 start-50 translate-middle bg-transparent">
                        <i class="fab fa-instagram text-white fs-3 bg-transparent"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4 bg-transparent">
            <div class="col-12 bg-transparent">
                <a href="#" class="btn InstagramBTN">
                    Follow Us on Instagram <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- .......INSTAGRAM UNIVERSE END......... -->



@endsection
