<div class="AboutTitleBreadCrumps">
    @php
        $imageUrl = isset($image) && $image ? asset($image) : asset('frontend/Assets/ProductListIMGs/ProductList.png');
    @endphp

    <div class="breadcrumb-image mb-3">
        <img src="{{ $imageUrl }}" alt="Breadcrumb Image" class="img-fluid">
    </div>
</div>




{{-- @php
    $segments = Request::segments();
    $breadcrumb = '<a href="' . url('/') . '">Home</a>';

    $path = '';
    foreach ($segments as $index => $segment) {
        $path .= '/' . $segment;
        $segmentName = ucwords(str_replace('-', ' ', $segment));
        $breadcrumb .= ' / <a href="' . url($path) . '">' . $segmentName . '</a>';
    }
@endphp

<div class="container-fluid AboutTitleBreadCrumps">
    <div class="row container bg-transparent">
        <div class="col-12 text-center bg-transparent">
            <h1 class=" bg-transparent">{{ end($segments) ? ucwords(str_replace('-', ' ', end($segments))) : 'Home' }}
            </h1>
        </div>
        <!-- <div class="col-12 text-center mt-2 bg-transparent">
            <nav aria-label="breadcrumb" class="bg-transparent">
                <ul class="breadcrumb justify-content-center bg-transparent">
                    <li class="breadcrumb-item bg-transparent" aria-current="page">{!! $breadcrumb !!}</li>
                </ul>
            </nav>
        </div> -->
    </div>
</div> --}}
