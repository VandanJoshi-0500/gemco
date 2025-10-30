@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-body card-head">
        <div class="d-md-flex gap-4 align-items-center">
            <div class="d-none d-md-flex">Import Products</div>
            <div class="ms-auto d-flex arcon-user-inner-search-outer">
                
            </div>
        </div>
    </div>
</div>
<div class="card mt-3">
    <div class="card-body table-responsive">
    @if ($errors->any())
    <div style="color: red;">
        @foreach ($errors->all() as $error)
            <p><strong>Error!</strong> {{ $error }}</p>
        @endforeach
    </div>
@endif

@if (session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif
    <form action="{{ route('admin.products.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="csv_file" required>
        <button type="submit">Import CSV</button>
    </form>

    </div>
</div>


@endsection
@section('script')

@endsection
