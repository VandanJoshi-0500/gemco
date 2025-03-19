
@extends('frontend.layouts.main')

@section('content')


    <!-- ..........ABOUT TITLE AND BREADCRUMPS.......... -->
    <div class="container-fluid AboutTitleBreadCrumps">
        <div class="row container bg-transparent">
            <div class="col-12 text-center bg-transparent">
                <h1 class=" bg-transparent">About Us</h1>
            </div>
            <div class="col-12 text-center mt-2 bg-transparent">
                <nav aria-label="breadcrumb" class="bg-transparent">
                    <ul class="breadcrumb justify-content-center bg-transparent">
                        <li class="breadcrumb-item bg-transparent"><a href="{{url('/home')}}" class="bg-transparent text-dark">Home</a>
                        </li>
                        <li class="breadcrumb-item active bg-transparent" aria-current="page">About Us</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- ..........ABOUT TITLE AND BREADCRUMPS END.......... -->



    <!-- ............GIFT PACKAGE SECTION................ -->
    <div class="container-fluid py-5 GiftpackageMainContainer">
        <div class="row container text-center bg-transparent">

            <div class="col-md-4 bg-transparent">
                <div class="GiftPackageSection">
                    <img src="{{url('frontend/Assets/AboutUsIMGs/GiftPackage.png')}}" width="60" height="60" alt="Gift Package">
                    <h4 class="mt-3">Gift Package</h4>
                    <p>Elegant gift for a special occasion to show someone how much you care.</p>
                </div>
            </div>

            <div class="col-md-4 bg-transparent">
                <div class="DiamondSection">
                    <img src="{{url('frontend/Assets/AboutUsIMGs/DiamondSection.png')}}" width="60" height="60" alt="Diamond Selection">
                    <h4 class="mt-3">Diamond Selection</h4>
                    <p>Diamond involves considering various factors often referred to as the "Four Cs".</p>
                </div>
            </div>

            <div class="col-md-4 bg-transparent">
                <div class="DesignRingSection">
                    <img src="{{url('frontend/Assets/AboutUsIMGs/RingDesign.png')}}" width="60" height="60" alt="Design Your Ring">
                    <h4 class="mt-3">Design Your Ring</h4>
                    <p>Individual engraving to perpetuate the deepest feelings. Rock A Right Hand Ring.</p>
                </div>
            </div>

        </div>
    </div>
    <!-- ............GIFT PACKAGE SECTION END................ -->


    <!-- .........ABOUTUS CONTENT AND IMAGE SECTION........... -->
    <div class="container-fluid py-5 d-flex align-items-center justify-content-center">
        <div class="row container align-items-center">
            <div class="col-lg-6 text-center">
                <img src="{{url('frontend/Assets/AboutUsIMGs/AboutUsContentIMG.png')}}" class="img-fluid" alt="About Us Image">
            </div>
            <div class="col-lg-6">
                <h2 class="mb-4 fs-3">Are you ready to revamp your jewelry? Stay with us for a comprehensive collection.</h2>
                <p>Coupling the hues of traditional jewelry with contemporary elegance, <strong>Gemco Designs</strong>
                    is a leading manufacturer, exporter, and wholesaler of handmade designer jewelry. We are prominent
                    for our innovative designs and marvelous products at reasonable prices.</p>
                <p>We have accomplished many online orders all around the US, Europe, Russia, and Middle East Countries.
                    Our in-house team of 15+ creative designers and more than 300 skilled craftsmen strive to infuse
                    perfection at the heart of every jewel.</p>
                <p>Our product range unveils a beautiful array of diamonds, gemstones, geodes, Victorian, enamel,
                    Bakelite, pearl, lava cameos, macramé, rose cut diamonds, and other finely assorted jewelry items.
                    Featuring an ideal collection in bangles, pendants, necklaces, rings, bracelets, earrings, and other
                    jewelry accessories, <strong>Gemco Designs</strong> holds a distinguished place in the international
                    jewelry market.</p>
            </div>
        </div>
    </div>
    <!-- .........ABOUTUS CONTENT AND IMAGE SECTION END........... -->




    <!-- ............COUNTER SECTION............ -->
    <div class="container-fluid text-center py-5 d-flex justify-content-center align-items-center">
        <div class="row container d-flex justify-content-between align-items-center g-4">
            <div class="col-md-4 ">
                <div class="p-4  CounterBox">
                    <h1>5000+</h1>
                    <p>ORDERS ACCOMPLISHED</p>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="p-4  CounterBox">
                    <h1>300+</h1>
                    <p>Skilled Craftsmen</p>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="p-4 CounterBox">
                    <h1>Best</h1>
                    <p>Exporter Award In Micro Unit 2011</p>
                </div>
            </div>
        </div>
    </div>
    <!-- ............COUNTER SECTION END............ -->


    <!-- ..............FOUNDER AND CEO SECTION.............. -->
    <div class="container-fluid py-5 d-flex justify-content-center align-items-center">
        <div class="row container align-items-center">
            <div class="col-lg-8">
                <h1 class="mb-2 fs-3">Offering the widest array of diamonds and gemstones derived from trustworthy
                    sources, Gemco Designs has emerged as a renowned jewelry wholesaler.</h1>
                <p class="mt-4">Established in 2003, Gemco Designs has emerged as a favorite jewelry destination of
                    people across the globe. Based in Jaipur (India), Gemco Designs has been successfully catering to
                    the jewelry enthusiasts of Asia, Australia, North America, Europe, and a few other continents. A
                    stalwart, visionary, and an illustrious businessman, Sunil Jain is a name that every individual in
                    the jewelry world reckons with. This futurist has left no stone unturned in making Gemco Designs a
                    quality-exceptional brand.</p>
                <p>With his brilliant entrepreneurial approach, he started exporting gemstones in 1990 across the globe.
                    The unsurpassed products and fierce strategies proved fruitful in initiating Gemco Designs in 2003.
                    A science graduate with 30 years of soaring experience, Sunil Jain is an ace in his field. It’s only
                    through his untiring patronage that Gemco Designs has successfully emerged as a leading jewelry
                    firm.</p>
                <p>Also, our highly skilled and professional team works in an ideal environment to deliver the best
                    services and customer care experience. We’re here at your disposal to deliver the optimum grade of
                    diamond and gemstone jewelry.</p>
            </div>
            <div class="col-lg-4 text-center">
                <img src="{{url('frontend/Assets/AboutUsIMGs/CEO.png')}}" class="img-fluid mb-3" alt="Sunil Jain" width="400"
                    height="400">
                <h4 class="fw-bold">Sunil Jain</h4>
                <p class="text-center">Founder / CEO</p>
            </div>
        </div>
    </div>
    <!-- ..............FOUNDER AND CEO SECTION END.............. -->



    <!-- .............REWARD SECTION............. -->
    <div class="container-fluid my-5 d-flex justify-content-center align-items-center bg-transparent">
        <div class="row container text-center bg-transparent">
            <div class="col-md-3 d-flex align-items-center justify-content-center bg-transparent">
                <div class="d-flex align-items-center gap-3 bg-transparent">
                    <img src="{{url('frontend/Assets/AboutUsIMGs/RewardIMG.png')}}" width="50" height="50" alt="" class="bg-transparent">
                    <div class="d-flex flex-column align-items-start justify-content-center bg-transparent">
                        <h4 class="mt-2">Reward Program</h4>
                        <p>Morbi tristique felis.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 d-flex align-items-center justify-content-center border-start bg-transparent">
                <div class="d-flex align-items-center gap-3 bg-transparent">
                    <img src="{{url('frontend/Assets/AboutUsIMGs/SpecialDiscountIMG.png')}}" width="50" height="50" alt=""
                        class="bg-transparent">
                    <div class="d-flex flex-column align-items-start justify-content-center bg-transparent">
                        <h4 class="mt-2">Special Discounts</h4>
                        <p>Mauris necviverra massadu.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 d-flex align-items-center justify-content-center border-start bg-transparent">
                <div class="d-flex align-items-center gap-3 bg-transparent">
                    <img src="{{url('frontend/Assets/AboutUsIMGs/FastShippingIMG.png')}}" width="70" height="50" alt=""
                        class="bg-transparent">
                    <div class="d-flex flex-column align-items-start justify-content-center bg-transparent">
                        <h4 class="mt-2">Fast Shipping</h4>
                        <p>Fusce lacinia interdum.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 d-flex align-items-center justify-content-center border-start bg-transparent">
                <div class="d-flex align-items-center gap-3 bg-transparent">
                    <img src="{{url('frontend/Assets/AboutUsIMGs/GreatPriceIMG.png')}}" width="50" height="50" alt=""
                        class="bg-transparent">
                    <div class="d-flex flex-column align-items-start justify-content-center bg-transparent">
                        <h4 class="mt-2">Great Prices</h4>
                        <p>Augue nunc bibendum.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .............REWARD SECTION END............. -->

@endsection
