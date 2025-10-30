@extends('admin.layouts.app')

@section('content')
    <div class="card mb-2">
        <div class="card-body">
            <div class="d-md-flex gap-4 align-items-center">
                <h4 class="mb-0">Hello, {{ Auth::user()->name }} </h4>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6 mb-2">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">My Profile</h5>
                </div>
                <div class="card-body text-center mt-3">
                    <?php $image = "{{url('/assets1/Images/users/avatar-1.jpg')}}"; ?>
                    {{-- @if (!blank(Auth::user()->image))
                        <img id="image" class="br-50" src="{{ $image }}"
                         alt="" style="height: 100px; width:100px;">
                    @else --}}

                    @php
                        $profileImage = Auth::user()->image;
                        $imagePath =
                            !empty($profileImage) && file_exists(public_path('settings/' . $profileImage))
                                ? asset('settings/' . $profileImage)
                                : asset('assets/user-profile.png'); // fallback/default image
                    @endphp

                    {{-- <span class="account-user-avatar">
                        <img src="{{ $imagePath }}" alt="user-image" width="32" class="rounded-circle">
                    </span> --}}

                    <img id="image" class="br-50" src="{{ $imagePath }}" alt=""
                        style="height: 100px; width:100px;">
                    {{-- @endif --}}

                    <div class="my-2">
                        {{-- <h4>{{Auth::user()->name}}</h4> --}}
                        <h4>{{ Auth::user()->name }}</h4>
                        {{-- @if (!blank(Auth::user()->email))<h6><i class="bi bi-envelope"></i><a href="mailto:{{Auth::user()->email}}"> {{Auth::user()->email}} </a></h6>@endif --}}
                        <h6><i class="bi bi-envelope"></i> {{ Auth::user()->email }}</h6>
                        {{-- @if (!blank(Auth::user()->phone))<h6><i class="bi bi-phone"></i>{{Auth::user()->phone}} </h6>@endif --}}
                        <h6><i class="bi bi-phone"></i> {{ Auth::user()->phone ?? null }}</h6>
                        <a href="{{ route('admin.edit.profile') }}" class="btn btn-primary mt-2">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Last Login Time</h5>
                </div>
                <div class="card-body">
                    <div class="text-center m-5">
                        <h4 class="houmanity-color">{{ Auth::user()->last_login_at }}</h4>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
