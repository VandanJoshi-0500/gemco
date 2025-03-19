@extends('frontend.layouts.app')

@section('content')
    <div class="page {{$page->slug}}">
        <div class="container page-content">
            <h2 class="pagetitle">{{$page->page_title}}</h2>
           {!! $page->description !!}
        </div>
    </div>
@endsection

