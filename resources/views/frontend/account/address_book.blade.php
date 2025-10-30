@extends('frontend.layouts.account')

@section('css')
    <link rel="stylesheet" href="{{ url('frontend/css/style.css') }}">
@endsection

@section('content')
    <!-- Main Content -->
    <div class="col-md-9 p-4 my-dashboard-right-container">
        <div class="bg-transparent" id="existing-address-container">
            <h4 class="page-main-title">Address Book</h4>
            <hr>

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


        {{-- <div class="bg-transparent" id="edit-existing-address" style="display:none;">
            <h4 class="mb-4 bg-transparent">Edit Address</h4>
            <hr />
            <form>
                <div class="row mb-3 bg-transparent">
                    <div class="col-md-6 bg-transparent">
                        <input type="text" class="form-control" placeholder="Shaival" />
                    </div>
                    <div class="col-md-6 bg-transparent">
                        <input type="text" class="form-control" placeholder="Shah" />
                    </div>
                </div>

                <div class="row mb-3 bg-transparent">
                    <div class="col-md-6 bg-transparent">
                        <input type="text" class="form-control" placeholder="Website" />
                    </div>
                    <div class="col-md-6 bg-transparent">
                        <input type="text" class="form-control" placeholder="Company" />
                    </div>
                </div>

                <div class="row mb-3 bg-transparent">
                    <div class="col-md-6 bg-transparent">
                        <input type="text" class="form-control" placeholder="Test" />
                    </div>
                    <div class="col-md-6 bg-transparent">
                        <input type="text" class="form-control" placeholder="test" />
                    </div>
                </div>

                <div class="row mb-3 bg-transparent">
                    <div class="col-md-6 bg-transparent">
                        <select class="form-select">
                            <option selected>New York</option>
                            <option>California</option>
                            <option>Texas</option>
                        </select>
                    </div>
                    <div class="col-md-6 bg-transparent">
                        <select class="form-select">
                            <option selected>United States</option>
                            <option>Canada</option>
                            <option>UK</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3 bg-transparent">
                    <div class="col-md-6 bg-transparent">
                        <input type="text" class="form-control" placeholder="10018" />
                    </div>
                    <div class="col-md-6 bg-transparent">
                        <input type="text" class="form-control" placeholder="223232" />
                    </div>
                </div>

                <div class="row mb-4 bg-transparent">
                    <div class="col-md-6 bg-transparent">
                        <input type="text" class="form-control" placeholder="Fax" />
                    </div>
                </div>

                <div class="d-flex justify-content-between bg-transparent">
                    <button type="button" class="btn btn-secondary w-25" onclick="goBackToAddressBook()">BACK</button>
                    <button type="submit" class="btn btn-warning text-white w-25">SAVE ADDRESS</button>
                </div>
            </form>
        </div> --}}

    </div>
@endsection

@section('script')
    {{-- <script>
        function editUserDetails() {
            // Hide the existing address section
            document.getElementById('existing-address-container').style.display = 'none';

            // Show the edit address form
            document.getElementById('edit-existing-address').style.display = 'block';
        }

        function goBackToAddressBook() {
            document.getElementById('edit-existing-address').style.display = 'none';
            document.getElementById('existing-address-container').style.display = 'block';
        }
    </script> --}}
@endsection
