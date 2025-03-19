
@extends('frontend.layouts.main')

@section('content')

    <!-- ..........ABOUT TITLE AND BREADCRUMPS.......... -->
    <div class="container-fluid AboutTitleBreadCrumps">
        <div class="row container bg-transparent">
            <div class="col-12 text-center bg-transparent">
                <h1 class=" bg-transparent">Collection</h1>
            </div>
            <div class="col-12 text-center mt-2 bg-transparent">
                <nav aria-label="breadcrumb" class="bg-transparent">
                    <ul class="breadcrumb justify-content-center bg-transparent">
                        <li class="breadcrumb-item bg-transparent"><a href="{{url('/home')}}" class="bg-transparent text-dark">Home</a>
                        </li>
                        {{-- <li class="breadcrumb-item bg-transparent"><a href="#"
                                class="bg-transparent text-dark">Pages</a>
                        </li> --}}
                        <li class="breadcrumb-item bg-transparent" aria-current="page">Collection</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- ..........ABOUT TITLE AND BREADCRUMPS END.......... -->


    <!-- .................PRODUCT PAGE MAIN SECTION............... -->

    <main>
        <div class="container-fluid d-flex align-items-center justify-content-center">
            <div class="container row py-5 d-flex align-items-start justify-content-between">
                <form class="col-md-3 product-sidebar d-flex flex-column gap-4 p-4 ">
                    <!-- Search Bar -->
                    <div class="product-search position-relative bg-transparent">
                        <input type="text" class="form-control ps-4 bg-transparent " placeholder="Search...">
                        <i class="fa fa-search position-absolute top-50 start-0 translate-middle-y ms-2 text-muted bg-transparent"></i>
                    </div>

                    <!-- Product Categories -->
                    <div class="product-category bg-transparent">
                        <h4>Product Categories</h4>
                        <div class="form-check d-flex flex-column gap-2 mt-3 bg-transparent">
                            <label class="form-check-label bg-transparent"><input class="form-check-input me-2 " type="checkbox"> Pearl Chain</label>
                            <label class="form-check-label bg-transparent"><input class="form-check-input me-2 " type="checkbox"> Earrings</label>
                            <label class="form-check-label bg-transparent"><input class="form-check-input me-2 " type="checkbox"> Rings</label>
                            <label class="form-check-label bg-transparent"><input class="form-check-input me-2 " type="checkbox"> Chain</label>
                            <label class="form-check-label bg-transparent"><input class="form-check-input me-2 " type="checkbox"> Necklace</label>
                            <label class="form-check-label bg-transparent"><input class="form-check-input me-2 " type="checkbox"> Bracelet</label>
                        </div>
                    </div>

                    <!-- Product Brands -->
                    <div class="product-category bg-transparent">
                        <h4>Product Brands</h4>
                        <div class="form-check d-flex flex-column gap-2 mt-3 bg-transparent">
                            <label class="form-check-label bg-transparent"><input class="form-check-input me-2" type="checkbox"> Glittering Gems</label>
                            <label class="form-check-label bg-transparent"><input class="form-check-input me-2" type="checkbox"> Dazzling Dames</label>
                            <label class="form-check-label bg-transparent"><input class="form-check-input me-2" type="checkbox"> Alluring Treasures</label>
                            <label class="form-check-label bg-transparent"><input class="form-check-input me-2" type="checkbox"> Diamond Dreams</label>
                            <label class="form-check-label bg-transparent"><input class="form-check-input me-2" type="checkbox"> Collector Jewelry</label>
                            <label class="form-check-label bg-transparent"><input class="form-check-input me-2" type="checkbox"> Precious Palette</label>
                        </div>
                    </div>

                    <!-- Collections -->
                    <div class="product-category bg-transparent">
                        <h4>Collections</h4>
                        <div class="form-check d-flex flex-column gap-2 mt-3 bg-transparent">
                            <label class="form-check-label bg-transparent"><input class="form-check-input me-2" type="checkbox"> Women's Rings</label>
                            <label class="form-check-label bg-transparent"><input class="form-check-input me-2" type="checkbox"> Women's Earrings</label>
                            <label class="form-check-label bg-transparent"><input class="form-check-input me-2" type="checkbox"> Women's Platinum</label>
                            <label class="form-check-label bg-transparent"><input class="form-check-input me-2" type="checkbox" id="ch2"> Women's Gold</label>
                            <label class="form-check-label bg-transparent accent">
                                <input class="form-check-input me-2" type="checkbox" id="ch1"> Women's Silver
                              </label>
                        </div>
                    </div>

                    <!-- Shop For -->
                    <div class="shop-for d-flex flex-wrap gap-2 bg-transparent">
                        <a type="button" class="btn btn-dark">RING</a>
                        <a type="button" class="btn btn-dark">EARRINGS</a>
                        <a type="button" class="btn btn-dark">BRACELETS</a>
                        <a type="button" class="btn btn-dark">SILVER</a>
                        <a type="button" class="btn btn-dark">GOLD</a>
                        <a type="button" class="btn btn-dark">PLATINUM</a>
                    </div>
                    <!-- Filter By Price -->
                    <div class="product-category-range bg-transparent">
                        <h4>Filter By Price</h4>
                        <input type="range" id="priceRange" name="price" min="54" max="2500" class="w-100 bg-transparent accent">
                        <h6 class="bg-transparent">Price: $54 - $2,500</h6>
                         <!-- Submit Button -->
                     <div class="fiter-submit-btn bg-transparent d-flex justify-content-start align-items-center">
                        <button type="submit" class="btn my-4">Apply Filters</button>
                    </div>
                    </div>



                      <!-- Clear Button -->
                      <div class="fiter-clear-btn bg-transparent d-flex justify-content-start align-items-center">
                        <button type="submit" class="btn btn-outline-dark my-2">Clear Filters</button>
                    </div>
                </form>

                <div class="col-md-9 d-flex flex-column gap-3 mt-2">
                    <div class="sortlist-section d-flex justify-content-between align-items-start bg-transparent">
                        <p>Showing 1-9 of 15 results</p>
                        <div class="dropdown">
                            <button class="btn border dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Sort by list
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Popular</a></li>
                                <li><a class="dropdown-item" href="#">Featured</a></li>
                                <li><a class="dropdown-item" href="#">Top Rated</a></li>
                                <li><a class="dropdown-item" href="#">Sort by Latest</a></li>
                                <li><a class="dropdown-item" href="#">Sort by Oldest</a></li>
                                <li><a class="dropdown-item" href="#">Price low to high</a></li>
                                <li><a class="dropdown-item" href="#">Price high to low</a></li>
                                <li><a class="dropdown-item" href="#">Highest Discount</a></li>
                                <li><a class="dropdown-item" href="#">Lowest Discount</a></li>
                                <li><a class="dropdown-item" href="#">Alphabetically A-Z</a></li>
                                <li><a class="dropdown-item" href="#">Alphabetically Z-A</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row product-list-section d-flex g-4 align-items-start justify-content-between">

                            <div class="col-md-4 mb-2 ">
                                <div class="card border-0 shadow-sm position-relative bg-white">
                                    <img src="{{url('frontend/Assets/ProductListIMGs/GoldRing.png')}}" class="card-img-top product-list-product-img p-2 bg-white image-fluid" alt="Jacinth Gold Ring">
                                    <div class="card-body text-center">
                                        <p class="text-center product-list-title">Romantic Florals</p>
                                        <h5>Jacinth Gold Ring</h5>
                                        <div class="d-flex gap-2 mt-3 product-list-btns d-flex justify-content-around">
                                            <a class="btn send-enquiry">Send Enquiry</a>
                                            <a class="btn quick-view" href='{{url('/detail')}}'>Quick View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-2 ">
                                <div class="card border-0 shadow-sm position-relative bg-white">
                                    <img src="{{url('frontend/Assets/ProductListIMGs/GoldRing.png')}}" class="card-img-top product-list-product-img p-2 bg-white image-fluid" alt="Jacinth Gold Ring">
                                    <div class="card-body text-center">
                                        <p class="text-center product-list-title">Romantic Florals</p>
                                        <h5>Jacinth Gold Ring</h5>
                                        <div class="d-flex gap-2 mt-3 product-list-btns d-flex justify-content-around">
                                            <a class="btn send-enquiry">Send Enquiry</a>
                                            <a class="btn quick-view" href='{{url('/detail')}}'>Quick View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-2 ">
                                <div class="card border-0 shadow-sm position-relative bg-white">
                                    <img src="{{url('frontend/Assets/ProductListIMGs/GoldRing.png')}}" class="card-img-top product-list-product-img p-2 bg-white image-fluid" alt="Jacinth Gold Ring">
                                    <div class="card-body text-center">
                                        <p class="text-center product-list-title">Romantic Florals</p>
                                        <h5>Jacinth Gold Ring</h5>
                                        <div class="d-flex gap-2 mt-3 product-list-btns d-flex justify-content-around">
                                            <a class="btn send-enquiry">Send Enquiry</a>
                                            <a class="btn quick-view" href='{{url('/detail')}}'>Quick View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-2 ">
                                <div class="card border-0 shadow-sm position-relative bg-white">
                                    <img src="{{url('frontend/Assets/ProductListIMGs/GoldRing.png')}}" class="card-img-top product-list-product-img p-2 bg-white image-fluid" alt="Jacinth Gold Ring">
                                    <div class="card-body text-center">
                                        <p class="text-center product-list-title">Romantic Florals</p>
                                        <h5>Jacinth Gold Ring</h5>
                                        <div class="d-flex gap-2 mt-3 product-list-btns d-flex justify-content-around">
                                            <a class="btn send-enquiry">Send Enquiry</a>
                                            <a class="btn quick-view" href='{{url('/detail')}}'>Quick View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-2 ">
                                <div class="card border-0 shadow-sm position-relative bg-white">
                                    <img src="{{url('frontend/Assets/ProductListIMGs/GoldRing.png')}}" class="card-img-top product-list-product-img p-2 bg-white image-fluid" alt="Jacinth Gold Ring">
                                    <div class="card-body text-center">
                                        <p class="text-center product-list-title">Romantic Florals</p>
                                        <h5>Jacinth Gold Ring</h5>
                                        <div class="d-flex gap-2 mt-3 product-list-btns d-flex justify-content-around">
                                            <a class="btn send-enquiry">Send Enquiry</a>
                                            <a class="btn quick-view" href='{{url('/detail')}}'>Quick View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-2 ">
                                <div class="card border-0 shadow-sm position-relative bg-white">
                                    <img src="{{url('frontend/Assets/ProductListIMGs/GoldRing.png')}}" class="card-img-top product-list-product-img p-2 bg-white image-fluid" alt="Jacinth Gold Ring">
                                    <div class="card-body text-center">
                                        <p class="text-center product-list-title">Romantic Florals</p>
                                        <h5>Jacinth Gold Ring</h5>
                                        <div class="d-flex gap-2 mt-3 product-list-btns d-flex justify-content-around">
                                            <a class="btn send-enquiry">Send Enquiry</a>
                                            <a class="btn quick-view" href='{{url('/detail')}}'>Quick View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-2 ">
                                <div class="card border-0 shadow-sm position-relative bg-white">
                                    <img src="{{url('frontend/Assets/ProductListIMGs/GoldRing.png')}}" class="card-img-top product-list-product-img p-2 bg-white image-fluid" alt="Jacinth Gold Ring">
                                    <div class="card-body text-center">
                                        <p class="text-center product-list-title">Romantic Florals</p>
                                        <h5>Jacinth Gold Ring</h5>
                                        <div class="d-flex gap-2 mt-3 product-list-btns d-flex justify-content-around">
                                            <a class="btn send-enquiry">Send Enquiry</a>
                                            <a class="btn quick-view" href='{{url('/detail')}}' >Quick View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-2 ">
                                <div class="card border-0 shadow-sm position-relative bg-white">
                                    <img src="{{url('frontend/Assets/ProductListIMGs/GoldRing.png')}}" class="card-img-top product-list-product-img p-2 bg-white image-fluid" alt="Jacinth Gold Ring">
                                    <div class="card-body text-center">
                                        <p class="text-center product-list-title">Romantic Florals</p>
                                        <h5>Jacinth Gold Ring</h5>
                                        <div class="d-flex gap-2 mt-3 product-list-btns d-flex justify-content-around">
                                            <a class="btn send-enquiry">Send Enquiry</a>
                                            <a class="btn quick-view" href='{{url('/detail')}}'>Quick View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-2 ">
                                <div class="card border-0 shadow-sm position-relative bg-white">
                                    <img src="{{url('frontend/Assets/ProductListIMGs/GoldRing.png')}}" class="card-img-top product-list-product-img p-2 bg-white image-fluid" alt="Jacinth Gold Ring">
                                    <div class="card-body text-center">
                                        <p class="text-center product-list-title">Romantic Florals</p>
                                        <h5>Jacinth Gold Ring</h5>
                                        <div class="d-flex gap-2 mt-3 product-list-btns d-flex justify-content-around">
                                            <a class="btn send-enquiry">Send Enquiry</a>
                                            <a class="btn quick-view" href='{{url('/detail')}}'>Quick View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="container">
                        <nav>
                            <ul class="pagination d-flex justify-content-center gap-3">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true" class="bg-transparent">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true" class="bg-transparent">&raquo;</span>
                                    </a>
                                </li>
                            </ul>

                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
