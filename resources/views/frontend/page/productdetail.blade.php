
@extends('frontend.layouts.main')

@section('content')

     <!-- ..........ABOUT TITLE AND BREADCRUMPS.......... -->
     {{-- <div class="container-fluid AboutTitleBreadCrumps">
        <div class="row container bg-transparent">
            <div class="col-12 text-center bg-transparent">
                <h1 class=" bg-transparent">Product Detail</h1>
            </div>
            <div class="col-12 text-center mt-2 bg-transparent">
                <nav aria-label="breadcrumb" class="bg-transparent">
                    <ul class="breadcrumb justify-content-center bg-transparent">
                        <li class="breadcrumb-item bg-transparent"><a href="{{url('/home')}}" class="bg-transparent text-dark">Home</a>
                        </li>
                        <!-- <li class="breadcrumb-item bg-transparent"><a href="#"
                                class="bg-transparent text-dark">Pages</a>
                        </li> -->
                        <li class="breadcrumb-item bg-transparent" aria-current="page">Tapered Baguette Sapphire Multiple Gemstone Pave Diamond Half-Moon Ring In 18k Yellow Gold</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div> --}}
    <!-- ..........ABOUT TITLE AND BREADCRUMPS END.......... -->


    <!-- .............PRODUCT DETAIL MAIN CONTENT........... -->
    <div class="container-fluid py-5 d-flex justify-content-center align-items-center">
        <div class="row container ">
            <!-- Product Images Section -->
            <div class="col-md-6 d-flex flex-column justify-content-center align-items-center">
                <div class="mb-3">
                    <img id="mainImage" src="{{url('frontend/Assets/ProductDetailIMGs/ProductDetail1.png')}}" class="img-fluid border rounded" alt="Product Image" width="500" height="500">
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <img src="{{url('frontend/Assets/ProductDetailIMGs/ProductDetail2.png')}}" class="img-thumbnail mx-1" width="100" onclick="switchImage(this.src)" alt="">
                    <img src="{{url('frontend/Assets/ProductDetailIMGs/ProductDetail3.png')}}" class="img-thumbnail mx-1" width="100" onclick="switchImage(this.src)" alt="">
                    <img src="{{url('frontend/Assets/ProductDetailIMGs/ProductDetail4.png')}}" class="img-thumbnail mx-1" width="100" onclick="switchImage(this.src)" alt="">
                </div>
            </div>

            <!-- Product Information Section -->
            <div class="col-md-6">
                <h4 class="">Tapered Baguette Sapphire Multiple Gemstone Pave Diamond Half-Moon Ring In 18k Yellow Gold</h4>

                <div class="d-flex align-items-center mb-2">
                    <span class="text-warning">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                    <p class="ms-2 mb-0">(1 Customer review)</p>
                </div>

                <hr>

                <p><strong>SKU:</strong> ING-8402 | <span class="text-success">Available in Stock (15 Items)</span></p>
                <p><strong>Categories:</strong> BAGUETTE JEWELRY, Cocktail Ring, Collection, Rings</p>

                <div class="mb-3">
                    <button class="btn bg-dark text-white me-2">Send Enquiry</button>
                    <button class="btn bg-dark text-white me-2">Add to Enquiry Basket</button>
                    <button class="btn bg-dark text-white"><i class="fa-solid fa-heart text-white bg-transparent"></i></button>
                </div>

                <h5>Additional Information</h5>
                <hr>
                <table class="table">
                    <tr>
                        <td>Weight</td>
                        <td>1 g</td>
                    </tr>
                    <tr>
                        <td>Dimensions</td>
                        <td>1 x 1 x 1 cm</td>
                    </tr>
                </table>

                <div>
                    <p><i class="fa-solid fa-check text-success"></i> Free Delivery & Free Shipping</p>
                    <p><i class="fa-solid fa-check text-success"></i> Secure Online Payment</p>
                </div>

                <hr>

                <div>
                    <p><strong>Social Media:</strong></p>
                    <i class="fa-brands fa-threads me-2 bg-transparent"></i>
                    <i class="fa-brands fa-instagram me-2 bg-transparent"></i>
                    <i class="fa-brands fa-facebook-f me-2 bg-transparent"></i>
                    <i class="fa-brands fa-youtube me-2 bg-transparent"></i>
                    <i class="fa-brands fa-x-twitter bg-transparent"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- .............PRODUCT DETAIL MAIN CONTENT END........... -->



    <!-- ..................ProductDetailTabSection....................... -->
    <div class=" container-fluid py-5 d-flex justify-content-center align-items-center">
        <div class="row container">
            <!-- Product Tabs -->
            <div class="col-12">
                <ul class="nav nav-tabs bg-transparent" id="productTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link bg-transparent text-dark" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab">Description</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link bg-transparent  text-dark" id="additional-info-tab" data-bs-toggle="tab" data-bs-target="#additional-info" type="button" role="tab">Additional Information</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link bg-transparent  text-dark" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab">Reviews (0)</a>
                    </li>
                </ul>
            </div>

            <!-- Product Description Section -->
            <div class="tab-content mt-4" id="productTabContent">
                <div class="tab-pane fade show active" id="description" role="tabpanel">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing.</p>
                        </div>
                        <div class="col-md-6 text-center">
                            <img src="{{url('frontend/Assets/ProductDetailIMGs/ProductDetialDescription.png')}}" class="img-fluid" alt="Product Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ..................ProductDetailTabSection END....................... -->


    <!-- .........RELATED PRODUCT SECTION............ -->
    <div class="container-fluid py-5 d-flex justify-content-center align-items-center flex-column RelatedProductsMAinContainer">
        <div class="text-center mb-4 bg-transparent">
            <p class="px-5 bg-transparent fs-5">Our Products</p>
        </div>
        <div class="text-center mb-4 bg-transparent">
            <h2 class="bg-transparent">Related products</h2>
        </div>
        <div class="row container d-flex justify-content-center align-items-center bg-transparent">
            <div class="col-md-3 mb-4 bg-transparent">
                <div class="card border-none text-center bg-transparent" >
                    <div class="position-relative">
                        <img src="{{('frontend/Assets/HomeProducts/StoneBracelet.png')}}" class="card-img-top p-3 border" alt="Jacinth gold Ring">
                    </div>
                    <div class="card-body ">
                        <p class="text-center">Romantic Florals</p>
                        <h5 class="card-title ProductName">Jacinth gold Ring</h5>
                        <div class="d-flex justify-content-center gap-2 mt-3">
                            <a class="btn SendEnquiry">Send Enquiry</a>
                            <a class="btn QuickView">Quick View</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4 bg-transparent">
                <div class="card border-none text-center">
                    <div class="position-relative">
                        <img src="{{url('frontend/Assets/HomeProducts/StoneBracelet.png')}}" class="card-img-top p-3 border" alt="Jacinth gold Ring">
                    </div>
                    <div class="card-body">
                        <p class="text-center">Romantic Florals</p>
                        <h5 class="card-title ProductName">Jacinth gold Ring</h5>
                        <div class="d-flex justify-content-center gap-2 mt-3">
                            <a class="btn SendEnquiry">Send Enquiry</a>
                            <a class="btn QuickView">Quick View</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4 bg-transparent">
                <div class="card border-none text-center">
                    <div class="position-relative">
                        <img src="{{url('frontend/Assets/HomeProducts/StoneBracelet.png')}}" class="card-img-top p-3 border" alt="Jacinth gold Ring">
                    </div>
                    <div class="card-body">
                        <p class="text-center">Romantic Florals</p>
                        <h5 class="card-title ProductName">Jacinth gold Ring</h5>
                        <div class="d-flex justify-content-center gap-2 mt-3">
                            <a class="btn SendEnquiry">Send Enquiry</a>
                            <a class="btn QuickView">Quick View</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4 bg-transparent">
                <div class="card border-none text-center">
                    <div class="position-relative">
                        <img src="{{url('frontend/Assets/HomeProducts/StoneBracelet.png')}}" class="card-img-top p-3 border" alt="Jacinth gold Ring">
                    </div>
                    <div class="card-body">
                        <p class="text-center">Romantic Florals</p>
                        <h5 class="card-title ProductName">Jacinth gold Ring</h5>
                        <div class="d-flex justify-content-center gap-2 mt-3">
                            <a class="btn SendEnquiry">Send Enquiry</a>
                            <a class="btn QuickView">Quick View</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .........RELATED PRODUCT SECTION END............ -->

@endsection
