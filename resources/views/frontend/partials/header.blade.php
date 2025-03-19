<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gemco</title>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marcellus&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="96x96" href="{{url('frontend/Assets/logo.png')}}">

    <!-- css link -->
    <link rel="stylesheet" href="{{url('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/MobileFriendly.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</head>
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    .discount-card {
            position: relative;
            overflow: hidden;
        }
        .discount-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
        .discount-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: start;
            color: white;
            text-align: center;
            padding: 20px;
        }
</style>

<body cz-shortcut-listen="true">

    <!-- .....NAVBAR..... -->
    <nav class="navbar navbar-expand-lg ">
        <div class="container Nav-Container">
            <!-- Logo on the left -->
            <a class="navbar-brand" href="{{route('home')}}">
                <img src="{{url('frontend/Assets/blacklogo.png')}}" alt="Logo" width="120" height="50">
            </a>

            <!-- Toggle Button for Mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


            <!-- Navigation Links in Center -->
            <div class="collapse navbar-collapse justify-content-center NavMenu" id="navbarNav">
                <ul class="navbar-nav Menu-UL">
                    <li class="nav-item Menu-LI"><a class="nav-link" href="{{route('home')}}">Home</a></li>
                    <li class="nav-item Menu-LI"><a class="nav-link" href="{{route('about')}}">About Us</a></li>
                    <li class="nav-item Menu-LI"><a class="nav-link" href="{{route('collection')}}">Collection</a></li>
                    <li class="nav-item Menu-LI"><a class="nav-link" href="{{route('jewellery')}}">Jewellery</a></li>
                    <li class="nav-item Menu-LI"><a class="nav-link" href="{{route('catalog')}}">Catalog</a></li>
                    <li class="nav-item Menu-LI"><a class="nav-link" href="{{route('contact')}}">Contact Us</a></li>
                </ul>
            </div>

            <!-- Icons and Button on the Right -->
            <div class="d-flex align-items-center NavIcons">
                <a href="#" class="nav-link"><i class="fas fa-search"></i></a>
                <a href="{{route('cart')}}" class="nav-link"><i class="fas fa-shopping-cart"></i></a>
                <a href="{{route('user.login')}}" class="nav-link"><i class="fas fa-user"></i></a>
                <a href="#" class="btn btn-primary ms-2 GetSpecialBTN">Get Special Offer</a>
            </div>
        </div>
    </nav>
    <!-- .....NAVBAR END..... -->
