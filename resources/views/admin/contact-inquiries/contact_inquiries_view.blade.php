@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-body card-head">
        <div class="d-md-flex gap-4 align-items-center">
            <div class="d-none d-md-flex">Contact Inquiry Details</div>
        </div>
    </div>
</div>
<div class="card mt-3">
    <div class="card-body table-responsive">
        <table id="" class="table table-custom rwd-table example1" style="width:100%">
            <tbody>
            
            <tr>
                    <th>ID</th>
                    <td>{{$contact_inquiry_details->id}}</td>
            </tr>
            <tr>
                    <th>Date</th>
                    <td>{{$contact_inquiry_details->created_at}}</td>
            </tr>
            <tr>
                    <th>Name</th>
                    <td>{{$contact_inquiry_details->name}}</td>
            </tr>
            <tr>
                    <th>Email</th>
                    <td>{{$contact_inquiry_details->email}}</td>
            </tr>
            <tr>
                    <th>Message</th>
                    <td>{{$contact_inquiry_details->message}}</td>
            </tr>
            
               
            </tbody>
        </table>
    </div>
</div>
@endsection
