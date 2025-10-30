
@extends('frontend.layouts.main')

@section('content')


      <!-- ..........ABOUT TITLE AND BREADCRUMPS.......... -->
      {{-- <div class="container-fluid AboutTitleBreadCrumps">
        <div class="row container bg-transparent">
            <div class="col-12 text-center bg-transparent">
                <h1 class=" bg-transparent">Cart</h1>
            </div>
            <div class="col-12 text-center mt-2 bg-transparent">
                <nav aria-label="breadcrumb" class="bg-transparent">
                    <ul class="breadcrumb justify-content-center bg-transparent">
                        <li class="breadcrumb-item bg-transparent"><a href="jewellery" class="bg-transparent text-dark">Home</a>
                        </li>
                        <li class="breadcrumb-item bg-transparent" aria-current="page">Cart</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div> --}}
    @include('frontend.components.dynamic-breadcrumb')
    <!-- ..........ABOUT TITLE AND BREADCRUMPS END.......... -->



    <!-- ..........................MY CART MAIN SECTION.............................. -->
    <div class="container-fluid pt-5 pb-0 d-flex justify-content-center align-items-center">
        <div class="row container d-flex justify-content-center align-items-start">
            <!-- Cart Products Section -->
            <div class="col-lg-8 bg-transparent">
                <div class="mb-4 bg-transparent">
                    <h2 class="text-uppercase bg-transparent">Glamorous Life</h2>
                    <h4>Shipping & Returns</h4>
                </div>

                <!-- Cart Products List -->
                <div class="list-group mb-4 bg-transparent gap-3 d-flex flex-column">
                    <div class="list-group-item d-flex align-items-center">
                        <img src="{{url('frontend/Assets/ProductListIMGs/GoldRing.png')}}" alt="" class="img-fluid me-3" width="100">
                        <div class="flex-grow-1 bg-transparent">
                            <p class="bg-transparent">Romantic Florals</p>
                            <h5 class="bg-transparent">Aquamarine Earrings</h5>
                            <p class="bg-transparent"><span class="bg-transparent">Size: XL</span> | <span class="bg-transparent">Color: Gray</span></p>
                        </div>
                        <div class="d-flex align-items-center bg-transparent">
                            <button class="btn btn-outline-secondary bg-transparent">-</button>
                            <span class="mx-2 bg-transparent">1</span>
                            <button class="btn btn-outline-secondary bg-transparent">+</button>
                        </div>
                        <h5 class="ms-3 bg-transparent">$39.99</h5>
                    </div>

                    <div class="list-group-item d-flex align-items-center">
                        <img src="{{url('frontend/Assets/ProductListIMGs/GoldRing.png')}}" alt="" class="img-fluid me-3" width="100">
                        <div class="flex-grow-1 bg-transparent">
                            <p class="bg-transparent">Romantic Florals</p>
                            <h5 class="bg-transparent">Aquamarine Earrings</h5>
                            <p class="bg-transparent"><span class="bg-transparent">Size: XL</span> | <span class="bg-transparent">Color: Gray</span></p>
                        </div>
                        <div class="d-flex align-items-center bg-transparent">
                            <button class="btn btn-outline-secondary bg-transparent">-</button>
                            <span class="mx-2 bg-transparent">1</span>
                            <button class="btn btn-outline-secondary bg-transparent">+</button>
                        </div>
                        <h5 class="ms-3 bg-transparent">$39.99</h5>
                    </div>

                    <div class="list-group-item d-flex align-items-center">
                        <img src="{{url('frontend/Assets/ProductListIMGs/GoldRing.png')}}" alt="" class="img-fluid me-3" width="100">
                        <div class="flex-grow-1 bg-transparent">
                            <p class="bg-transparent">Romantic Florals</p>
                            <h5 class="bg-transparent">Aquamarine Earrings</h5>
                            <p class="bg-transparent"><span class="bg-transparent">Size: XL</span> | <span class="bg-transparent">Color: Gray</span></p>
                        </div>
                        <div class="d-flex align-items-center bg-transparent">
                            <button class="btn btn-outline-secondary bg-transparent">-</button>
                            <span class="mx-2 bg-transparent">1</span>
                            <button class="btn btn-outline-secondary bg-transparent">+</button>
                        </div>
                        <h5 class="ms-3 bg-transparent">$39.99</h5>
                    </div>

                    <div class="list-group-item d-flex align-items-center">
                        <img src="{{url('frontend/Assets/ProductListIMGs/GoldRing.png')}}" alt="" class="img-fluid me-3" width="100">
                        <div class="flex-grow-1 bg-transparent">
                            <p class="bg-transparent">Romantic Florals</p>
                            <h5 class="bg-transparent">Aquamarine Earrings</h5>
                            <p class="bg-transparent"><span class="bg-transparent">Size: XL</span> | <span class="bg-transparent">Color: Gray</span></p>
                        </div>
                        <div class="d-flex align-items-center bg-transparent">
                            <button class="btn btn-outline-secondary bg-transparent">-</button>
                            <span class="mx-2 bg-transparent">1</span>
                            <button class="btn btn-outline-secondary bg-transparent">+</button>
                        </div>
                        <h5 class="ms-3 bg-transparent">$39.99</h5>
                    </div>
                    <!-- Repeat this block for more products -->
                </div>

                <!-- Gift Wrap Section -->
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="giftWrap">
                    <label class="form-check-label" for="giftWrap">
                        Gift Wrap Your Purchase For Just $9.99
                    </label>
                </div>

                <!-- Action Buttons -->
                <div class="mb-3 d-flex gap-3">
                    <button class="btn ReturnStore bg-dark text-white py-2 px-4">Return To Store</button>
                    <button class="btn EmptyCart bg-dark text-white py-2 px-4">Empty Cart</button>
                </div>

                <!-- Order Special Instructions -->
                <div class="mb-3">
                    <label for="orderInstructions" class="form-label">Order Special Instructions:</label>
                    <textarea id="orderInstructions" class="form-control" rows="4" placeholder="Additional Information"></textarea>
                </div>
            </div>

            <!-- Cart Estimate Section -->
            <div class="col-lg-4 bg-white p-3 position-sticky top-0">
                <h4>Shipping & Estimate</h4>
                <form class="mb-3">
                    <div class="mb-2 bg-transparent">
                        <label class="form-label bg-transparent">Country / Region:</label>
                        <input type="text" class="form-control ">
                    </div>
                    <div class="mb-2 bg-transparent">
                        <label class="form-label bg-transparent">State:</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-2 bg-transparent">
                        <label class="form-label bg-transparent">Pin / Zip Code:</label>
                        <input type="text" class="form-control">
                    </div>
                    <button class="btn bg-dark text-white my-3 w-100">Calculate Shipping</button>
                </form>

                <!-- Subtotal & Checkout -->
                <div class="d-flex justify-content-between mb-2 bg-transparent">
                    <p>Subtotal:</p>
                    <p>$39.99</p>
                </div>
                <div class="text-muted mb-3 bg-transparent">
                    <i class="bi bi-exclamation-circle"></i>
                    Taxes Calculated At Checkout
                </div>
                <div class="form-check mb-3 bg-transparent">
                    <input class="form-check-input " type="checkbox" id="agreeTerms">
                    <label class="form-check-label bg-transparent" for="agreeTerms">
                        I Agree to Terms & Conditions
                    </label>
                </div>
                <button class="btn bg-dark text-white w-100">Proceed To Checkout</button>
            </div>
        </div>
    </div>
    <!-- ..........................MY CART MAIN SECTION END.............................. -->



    <!-- ................SUPPORT SECTION........... -->
     <div class="container-fluid py-5 d-flex justify-content-center align-items-center">
        <div class="row container gy-4">
            <div class="col-md-4">
                <div class="d-flex align-items-center p-3 border-end">
                    <div class="me-3">
                        <img src="{{url('frontend/Assets/Cart/insurance.png')}}" alt="Shipping Policy" width="50">
                    </div>
                    <div>
                        <h5 class="mb-1">Shipping Policy</h5>
                        <p class="mb-0 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex align-items-center p-3 border-end">
                    <div class="me-3">
                        <img src="{{url("frontend/Assets/Cart/technical-support.png")}}" alt="Customer Support" width="50">
                    </div>
                    <div>
                        <h5 class="mb-1">Customer Support</h5>
                        <p class="mb-0 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex align-items-center p-3">
                    <div class="me-3">
                        <img src="{{url('frontend/Assets/Cart/store.png')}}" alt="Locate Store" width="50">
                    </div>
                    <div>
                        <h5 class="mb-1">Locate Store</h5>
                        <p class="mb-0 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ................SUPPORT SECTION END........... -->

@endsection
