@extends('layouts.masterLayout')
@section('content')
    @include('includes.header')
    <section class="banner-section style-two">
        <div class="background-layer"
             style="background-image: url('https://www.lomvtor.ru/images/sdat-chernyj-metallolom-v-podolske.jpg');"></div>
        <div class="auto-container">
            <div class="content-box">
                <div class="upper-heading">
                    <h3>
                        <span class="typed-words"></span>
                    </h3>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        new Typed('.typed-words', {
            strings: ["Продай лом", "Купи лом", "Купи цветмет", "Продай чермет"],
            typeSpeed: 80,
            backSpeed: 80,
            backDelay: 4000,
            startDelay: 1000,
            loop: true,
            showCursor: true
        })
    </script>
@endpush
