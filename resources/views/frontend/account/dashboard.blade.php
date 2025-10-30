@extends('frontend.layouts.account')

@section('css')
    <link rel="stylesheet" href="{{ url('frontend/css/style.css') }}">
@endsection

@section('content')
    <!-- Main Content -->
    <div class="col-md-9 p-4 my-dashboard-right-container">
        <h4 class="page-main-title">Account Dashboard</h4>
        <hr>
        <p class="bg-transparent"><strong class="bg-transparent text-capitalize">Hello, {{$user->first_name.' '.$user->last_name}} !</strong></p>
        <p class="mb-4">Your Account Dashboard gives you an overview of all your recent activity and account information. You can click on the link to view or edit this information.</p>

        <!-- <hr> -->
        <div class="d-flex justify-content-between align-items-center mb-2 bg-transparent">
            <h5 class="bg-transparent"><strong class="bg-transparent">Contact Information</strong></h5>
            <a href="{{route('account_information')}}" class="edit-link bg-transparent"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
        </div>
        <div class="d-flex flex-column bg-transparent my-dashboard-change-password-p">
            <p class="bg-transparent">{{$user->first_name.' '.$user->last_name}}</p>
            <p class="bg-transparent">{{$user->email}}</p>
            <a href="#" class="edit-link bg-transparent">Change Password</a>
        </div>


        <h5 class="bg-transparent mt-4"><strong class="bg-transparent">Address Book</strong></h5>
        <div class="row bg-transparent mt-4">
            <div class="col-md-4 bg-transparent">
                <div class="card p-3 mb-3">
                    <h6 class="bg-transparent"><strong class="bg-transparent">Address</strong></h6>
                    <span class="bg-transparent">{{$user->first_name.' '.$user->last_name}}</span>
                    <span class="bg-transparent">{{$user->streetaddress}}</span>
                    <span class="bg-transparent">{{$user->city}}, {{$state->name ?? 'N/A'}}, {{$user->zipcode}}</span>
                    <span class="bg-transparent">{{$country->name ?? 'N/A'}}</span>
                    <span class="bg-transparent">T: {{$user->phone}}</span>
                    <a href="{{route('edit_account_information',$user->id)}}" class="edit-link bg-transparent mt-3">Edit Address</a>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
@endsection
