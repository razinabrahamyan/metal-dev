@extends('layouts.masterLayout')
@section('content')
    @include('includes.header')
    @include('elements.posts.create')
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset(mix('user_assets/css/dynamicAddress.css')) }}">
@endpush
