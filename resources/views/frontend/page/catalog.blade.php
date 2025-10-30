@extends('frontend.layouts.main')

@section('content')

    <!-- ..........ABOUT TITLE AND BREADCRUMPS.......... -->
    @include('frontend.components.dynamic-breadcrumb')
    <!-- ..........ABOUT TITLE AND BREADCRUMPS END.......... -->


    <!-- ............REQUEST A CATALOG.......... -->
    {{-- <div class="container-fluid text-center py-5 d-flex align-items-center justify-content-center">
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
    </div> --}}
    <!-- ............REQUEST A CATALOG END.......... -->

    <!-- ........REQUEST CATALOG FORM ........ -->
    <div class="container-fluid py-4 d-flex align-items-center justify-content-center">
        <div class="row container justify-content-center">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Display error messages -->
                @if ($errors->any())
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                @endif
                <form id="myForm" action="{{ route('submit.catalog.form') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3 catalog-fields-mobile">
                        <div class="col-md-6">
                            {{-- <label for="name" class="form-label">Your Name (required)</label>
                            <input type="text" name="name" class="form-control required" required> --}}
                            <input type="text" class="form-control required" id="name" name="name"
                                placeholder="Your Name (required)" required>
                            @if ($errors->has('name'))
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                        <div class="col-md-6">
                            {{-- <input type="email" name="email" class="form-control required" required> --}}
                            <input type="email" class="form-control required" id="email" name="email"
                                placeholder="Your Email (required)" required>
                            @if ($errors->has('email'))
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3 catalog-fields-mobile">
                        <div class="col-md-6">
                            {{-- <input type="text" name="phone" class="form-control required" required> --}}
                            <input type="tel" class="form-control required" id="phone" name="phone"
                                placeholder="Your Phone Number (required)" required>
                            @if ($errors->has('phone'))
                                <p class="text-danger">{{ $errors->first('phone') }}</p>
                            @endif
                        </div>
                        <div class="col-md-6">
                            {{-- <input type="text" name="country" class="form-control required" required> --}}
                            <input type="text" class="form-control required" id="country" name="country"
                                placeholder="Your Country (required)" required>
                            @if ($errors->has('country'))
                                <p class="text-danger">{{ $errors->first('country') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3 catalog-fields-mobile">
                        <div class="col-md-6 bg-transparent">
                            {{-- <select name="category[]" class="form-select" id="category" multiple>
                                <option value="All" class="bg-transparent">All</option>
                                <option value="Necklaces" class="bg-transparent">Necklaces</option>
                                <option value="Bracelets and Bangles" class="bg-transparent">Bracelets and Bangles</option>
                                <option value="Earrings" class="bg-transparent">Earrings</option>
                                <option value="Rings" class="bg-transparent">Rings</option>
                            </select> --}}
                            <select name="category[]" class="form-select" id="category" multiple>
                                <option value="All" class="bg-transparent">All</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->name }}" class="bg-transparent">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            {{-- <select name="collection[]" class="form-select" id="collection" multiple>
                                <option value="All" class="bg-transparent">All</option>
                                <option value="Bloom" class="bg-transparent">Bloom</option>
                                <option value="Dangle" class="bg-transparent">Dangle</option>
                                <option value="Glamour" class="bg-transparent">Glamour</option>
                                <option value="Iconic" class="bg-transparent">Iconic</option>
                                <option value="Illusion" class="bg-transparent">Illusion</option>
                                <option value="Infinity" class="bg-transparent">Infinity</option>
                                <option value="Lumiere" class="bg-transparent">Lumiere</option>
                                <option value="The One" class="bg-transparent">The One</option>
                                <option value="Trend" class="bg-transparent">Trend</option>
                                <option value="Unique" class="bg-transparent">Unique</option>
                                <option value="Victorian" class="bg-transparent">Victorian</option>
                            </select> --}}
                            <select name="collection[]" class="form-select" id="collection" multiple>
                                <option value="All" class="bg-transparent">All</option>
                                @foreach ($collections as $collection)
                                    <option value="{{ $collection->name }}" class="bg-transparent">
                                        {{ $collection->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- <div class="mb-3">
                            {{-- <input type="file" name="attachment" class="form-control" style="font-size:15px !important;"> --}}
                            <input type="file" class="form-control" id="file" name="attachment">
                        </div> -->
                    <div class="mb-3">
                        {{-- <textarea name="comments" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 150px;padding:25px 20px !important !important;font-size:15px !important;"></textarea> --}}
                        <textarea class="form-control" id="message" name="comments" rows="4" placeholder="Your Message"></textarea>
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
