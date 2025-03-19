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
                    <th>Message</th>
                    <th>Date</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($contact_inquiries) > 0)
                    @foreach ($contact_inquiries as $contact_inquiry)
                        <tr>
                            <td data-header="ID">{{$loop->index+1}}</td>
                            <td data-header="Customer Name"><a href="{{ route('admin.view.contact.inquiries',$contact_inquiry->id) }}" class="text-primary">{{$contact_inquiry->name}}</td>
                            <td data-header="Customer Email">{{$contact_inquiry->email}}</td>
                            <td data-header="Customer Message">{{ \Illuminate\Support\Str::limit($contact_inquiry->message, 50) }}</a></td>
                            <td>{{ date($setting->date_format,strtotime($contact_inquiry->created_at)) }}</td>
                            <td data-th="Action" class="text-md-end">
                                <div class="d-flex float-end">
                                    <a href="{{ route('admin.view.contact.inquiries',$contact_inquiry->id) }}" class="btn btn-primary">View</a>
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
