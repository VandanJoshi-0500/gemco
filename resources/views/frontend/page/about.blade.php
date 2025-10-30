@extends('frontend.layouts.main')

@section('content')
    <!-- ..........ABOUT TITLE AND BREADCRUMPS.......... -->
    @include('frontend.components.dynamic-breadcrumb')
    <!-- ..........ABOUT TITLE AND BREADCRUMPS END.......... -->



    <!-- ............GIFT PACKAGE SECTION................ -->
    {{-- <div class="container-fluid py-5 GiftpackageMainContainer">
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
    </div> --}}
    <!-- ............GIFT PACKAGE SECTION END................ -->


    <!-- .........ABOUTUS CONTENT AND IMAGE SECTION........... -->
    <div class="container-fluid py-5 d-flex align-items-center justify-content-center">
        <div class="row container align-items-center">
            <div class="col-lg-6 text-center">
                <img src="{{ url('frontend/Assets/AboutUsIMGs/AboutUsContentIMG.png') }}" class="img-fluid"
                    alt="About Us Image">
            </div>
            <div class="col-lg-6">
                <h2 class="mb-4 fs-3">Gemco Designs</h2>
                <p>At <strong>Gemco Designs</strong>, we bring together the timeless beauty of traditional craftsmanship with the quiet sophistication of modern design. As a trusted manufacturer, exporter, and wholesaler of fine jewelry, we are known for our refined aesthetic, masterful detailing, and unwavering commitment to quality.</p>
                <p>Over the years, our creations have found homes across the US, Europe, Russia, and the Middle East — each piece carrying with it a story of artistry and care. Behind every jewel stands a team of over 15 designers and more than 300 skilled artisans, who work meticulously to transform precious materials into wearable works of art.</p>
                <p>From everyday classics to statement pieces, we approach each design with an understanding that jewelry is not merely an accessory, but a personal expression — an heirloom in the making.</p>
                <p>With a reputation built on integrity, attention to detail, and a deep respect for the art of fine jewelry, <strong>Gemco Designs</strong> continues to quietly serve discerning clients around the world.</p>
            </div>
        </div>
    </div>
    <!-- .........ABOUTUS CONTENT AND IMAGE SECTION END........... -->




    <!-- ............COUNTER SECTION............ -->
    <div class="container-fluid text-center py-5 d-flex justify-content-center align-items-center">
        <div class="row container d-flex justify-content-between align-items-center g-4">
            <div class="col-md-4">
                <div class="p-4 CounterBox">
                    <h1 class="counter" data-target="40000">0</h1>
                    <p>Orders Fulfilled</p>
                    {{-- <p>ORDERS ACCOMPLISHED</p> --}}
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 CounterBox">
                    <h1 class="counter" data-target="250">0</h1>
                    <p>Skilled Craftsmen</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 CounterBox">
                    <h1 class="counter" data-target="30">0</h1>
                    <p>Countries</p>
                    {{-- <h1>Best</h1>
                    <p>Exporter Award In Micro Unit 2011</p> --}}
                </div>
            </div>
            {{-- <div class="col-md-4 ">
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
            </div> --}}
        </div>
    </div>
    <!-- ............COUNTER SECTION END............ -->


    <!-- ..............FOUNDER AND CEO SECTION.............. -->
    <div class="container-fluid py-5 d-flex justify-content-center align-items-center">
        <div class="row container align-items-center">
            <div class="col-lg-8">
                <h1 class="mb-2 fs-3">About the Founder and CEO</h1>
                <!-- {{-- <p class="mt-4">Established in 2003, Gemco Designs has emerged as a favorite jewelry destination of
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
                    diamond and gemstone jewelry.</p> --}} -->
                <!-- <p class="mt-4">
                    At the heart of Gemco Designs is our founder and director, Mr. Sunil Jain—a visionary, trailblazer, and
                    respected figure in the global jewelry industry. With a profound understanding of gemstones and market
                    dynamics, Mr. Jain began his entrepreneurial journey in 1990, exporting premium gemstones around the
                    world. His foresight, strategic acumen, and commitment to excellence laid the foundation for what would
                    become a world-class jewelry brand.
                </p>
                <p>
                    Mr. Jain has dedicated his career to building a brand that reflects precision, quality, and innovation.
                    Under his dynamic leadership, Gemco Designs has earned a stellar reputation for delivering high-quality,
                    design-forward diamond and gemstone jewelry.
                </p> -->
                <p>At the helm of Gemco Designs stands our founder and director, <strong>Mr. Sunil Jain</strong> — a distinguished figure in the global jewelry industry, known for his integrity, deep business insight, and refined understanding of gemstones and design.</p>
                <p>Beginning his journey in 1990 with the export of fine gemstones, Mr. Jain steadily built trusted relationships across international markets, guided by an unwavering commitment to quality and ethical business practices. His rare ability to balance creative vision with commercial pragmatism has shaped Gemco Designs into a respected manufacturing partner for clients worldwide.</p>
                <p>Under his leadership, Gemco Designs has grown not only through its craftsmanship and design sensibility, but through a reputation for reliability, transparency, and long-term partnership — values that remain central to every aspect of our work.</p>
            </div>
            <div class="col-lg-4 text-center">
                <img src="{{ url('frontend/Assets/AboutUsIMGs/ceo.jpg') }}" class="img-fluid mb-3" alt="Sunil Jain"
                    width="300" height="300">
                <h4 class="fw-bold">Sunil Jain</h4>
                <p class="text-center">Founder / CEO</p>
            </div>
        </div>
    </div>
    <!-- ..............FOUNDER AND CEO SECTION END.............. -->



    <!-- .............REWARD SECTION............. -->
    {{-- <div class="container-fluid my-5 d-flex justify-content-center align-items-center bg-transparent">
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
    </div> --}}
    <!-- .............REWARD SECTION END............. -->
@endsection



@section('script')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const counters = document.querySelectorAll('.counter');
        const duration = 2000; // Animation duration in milliseconds (2 seconds)

        const animateCounters = () => {
            counters.forEach(counter => {
                const target = +counter.getAttribute('data-target');
                const start = 0;
                const startTime = performance.now();

                const updateCount = (currentTime) => {
                    const elapsed = currentTime - startTime;
                    const progress = Math.min(elapsed / duration, 1); // Ensure it never exceeds 1
                    const currentValue = Math.floor(progress * target);
                    counter.innerText = currentValue;

                    if (progress < 1) {
                        requestAnimationFrame(updateCount);
                    } else {
                        counter.innerText = target + '+';
                    }
                };

                requestAnimationFrame(updateCount);
            });
        };

        // Optional: Animate only when in viewport
        const options = {
            threshold: 0.6
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    observer.disconnect(); // Only run once
                }
            });
        }, options);

        observer.observe(document.querySelector('.CounterBox'));
    });
</script>
@endsection