@extends('layouts.masterLayout')
@section('content')
    @include('includes.header')
    @include('elements.posts.show')
@endsection
@push('scripts')
    <script src="{{asset('user_assets/js/phoneInput.js')}}"></script>
@endpush
