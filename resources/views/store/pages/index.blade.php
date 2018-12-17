@extends('store.layouts.master')
@section('content')
<!-- CONTENT AREA -->
<div class="content-area">
    @include('store.partials.slider')
    @include('store.partials.media-link')
    @include('store.partials.featured-newest-top-seller')
    @include('store.partials.message-box')
    @include('store.partials.top-product')
    @include('store.partials.recent-post')
    @include('store.partials.brand-client')
    @include('store.partials.top-information')
    @include('store.partials.shop-info-banners')
</div>
<!-- /CONTENT AREA -->
@endsection
