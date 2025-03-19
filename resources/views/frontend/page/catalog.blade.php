
@extends('frontend.layouts.main')

@section('content')

    <!-- ..........ABOUT TITLE AND BREADCRUMPS.......... -->
    <div class="container-fluid AboutTitleBreadCrumps">
        <div class="row container bg-transparent">
            <div class="col-12 text-center bg-transparent">
                <h1 class=" bg-transparent">Request a Catalog</h1>
            </div>
            <div class="col-12 text-center mt-2 bg-transparent">
                <nav aria-label="breadcrumb" class="bg-transparent">
                    <ul class="breadcrumb justify-content-center bg-transparent">
                        <li class="breadcrumb-item bg-transparent"><a href="{{url('/home')}}" class="bg-transparent text-dark">Home</a>
                        </li>
                        {{-- <li class="breadcrumb-item bg-transparent"><a href="#"
                                class="bg-transparent text-dark">Pages</a>
                        </li> --}}
                        <li class="breadcrumb-item bg-transparent" aria-current="page">Request a Catalog</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- ..........ABOUT TITLE AND BREADCRUMPS END.......... -->


    <!-- ............REQUEST A CATALOG.......... -->
    <div class="container-fluid text-center py-5 d-flex align-items-center justify-content-center">
        <div class="row container d-flex align-items-center justify-content-center">
            <div class="col-lg-8">
                <h1 class="mb-3">Request a Catalog</h1>
                <p class="text-center">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                    scrambled it to make a type specimen book.
                </p>
            </div>
        </div>
    </div>
    <!-- ............REQUEST A CATALOG END.......... -->




    <!-- ........REQUEST CATALOG FORM ........ -->
    <div class="container-fluid py-4 d-flex align-items-center justify-content-center">
        <div class="row container justify-content-center">
            <div class="col-md-12">
                <form id="myForm">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Your Name (required)" required>
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Your Email (required)" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Your Phone Number (required)" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="country" name="country" placeholder="Your Country (required)" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <select class="form-select" name="category" id="category" required>
                                <option selected disabled>Select Your Category</option>
                                <option value="saab">Saab</option>
                                <option value="opel">Opel</option>
                                <option value="audi">Audi</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select class="form-select" name="collection" id="collection" required>
                                <option selected disabled>Select Your Collection</option>
                                <option value="saab">Saab</option>
                                <option value="opel">Opel</option>
                                <option value="audi">Audi</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="file" class="form-control" id="file" name="file">
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" id="message" name="message" rows="4" placeholder="Your Message"></textarea>
                    </div>
                    <div class="text-center RequestCatalogBTN">
                        <button type="submit" class="btn ">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ........REQUEST CATALOG FORM END ........ -->


@endsection
