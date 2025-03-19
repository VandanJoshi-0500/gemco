@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-body card-head">
        <div class="d-md-flex gap-4 align-items-center">
            <div class="d-none d-md-flex">All Records</div>
        </div>
    </div>
</div>
<div class="card mt-3">
    <div class="card-body table-responsive">
        <table id="" class="table table-custom rwd-table example1" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Country</th>
                    <th>Company</th>
                    <th>Category</th>
                    <th>Collection</th>
                    <th>Attachment</th>
                    <th>Date</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($catalog_requests) > 0)
                    @foreach ($catalog_requests as $catalog_request)
                        <tr>
                            <td data-header="ID">{{$loop->index+1}}</td>
                            <td data-header="Customer Name"><a href="{{ route('admin.view.catalog.requests',$catalog_request->id) }}" class="text-primary">{{$catalog_request->name}}</td>
                            <td data-header="Customer Email">{{$catalog_request->email}}</td>
                            <td data-header="Customer Phone">{{$catalog_request->phone}}</td>
                            <td data-header="Country">{{$catalog_request->country}}</td>
                            <td data-header="Company">{{$catalog_request->company}}</td>
                            <td data-header="Category">{{$catalog_request->category}}</td>
                            <td data-header="Collection">{{$catalog_request->collection}}</td>
                            <td data-header="Attachment">
                                @if(!empty($catalog_request->attachment))
                                        <a href="{{ asset('storage/' . $catalog_request->attachment) }}" target="_blank">
                                        Link
                                        </a>
                                @else
                                    <span>-</span>
                                @endif

                            </td>
                            <td>{{ date($setting->date_format,strtotime($catalog_request->created_at)) }}</td>
                            <td data-th="Action" class="text-md-end">
                                <div class="d-flex float-end">
                                    <a href="{{ route('admin.view.catalog.requests',$catalog_request->id) }}" class="btn btn-primary">View</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="text-center">
                        <td colspan="6">Records Not Found.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
