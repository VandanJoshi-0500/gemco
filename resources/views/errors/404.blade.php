
@extends('frontend.layouts.main')

@section('main-container')


<!-- ERROR PAGE CONTENT -->
    <div class="container-fluid d-flex flex-column align-items-center text-center justify-content-center error-page">
        <img src="{{url('frontend/Assets/ErrorPage/404.png')}}" alt="404 Error" class="img-fluid mb-4" style="max-width: 300px;">

        <h1 class="">Oops! The Page Not Found.</h1>

        <p class="text-center w-75">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi sequi blanditiis, illum quibusdam nostrum eius quas voluptate odio, possimus quam cupiditate ipsum atque sunt rerum saepe assumenda a quaerat eveniet?
        </p>

        <a href="{{url('/home')}}" class="btn ErrorPageBTN mt-3">Back To Home</a>
    </div>
<!-- ERROR PAGE CONTENT END -->


@endsection
