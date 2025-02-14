@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-body card-head">
        <div class="d-md-flex gap-4 align-items-center">
            <div class="d-none d-md-flex">Caltalog Request Details</div>
        </div>
    </div>
</div>
<div class="card mt-3">
    <div class="card-body table-responsive">
        <table id="" class="table table-custom rwd-table example1" style="width:100%">
            <tbody>
            
            <tr>
                    <th>ID</th>
                    <td>{{$catalog_request_details->id}}</td>
            </tr>
            <tr>
                    <th>Date</th>
                    <td>{{$catalog_request_details->created_at}}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td data-header="Customer Name">{{$catalog_request_details->name}}</td>
                </tr>
            <tr>
                <th>Email</th>
            <td data-header="Customer Email">{{$catalog_request_details->email}}</td>
            </tr>
           
            <tr>
                <th>Phone</th>
            <td data-header="Customer Phone">{{$catalog_request_details->phone}}</td>
            </tr>
            <tr>
                <th>Country</th>
            <td data-header="Country">{{$catalog_request_details->country}}</td>
            </tr>
            <tr>
                <th>Company</th>
            <td data-header="Company">{{$catalog_request_details->company}}</td>
            </tr>
            <tr>
                <th>Category</th>
            <td data-header="Category">{{$catalog_request_details->category}}</td>
            </tr>
            <tr>
                <th>Collection</th>
            <td data-header="Collection">{{$catalog_request_details->collection}}</td>
            </tr>
            <tr>
                <th>Attachment</th>
            <td data-header="Attachment">
                @if(!empty($catalog_request_details->attachment))
                        <a href="{{ asset('storage/' . $catalog_request_details->attachment) }}" target="_blank">
                        Link
                        </a>
                @else
                    <span>-</span>
                @endif

            </td>
            </tr>
            <tr>
                    <th>Comments</th>
                    <td>{{$catalog_request_details->message}}</td>
            </tr>
           
        </tr>
               
            </tbody>
        </table>
    </div>
</div>
@endsection
