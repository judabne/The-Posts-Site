@extends('layouts.judylayout')
@section('title', 'About')
@section('extra-headers')
<link rel="stylesheet" href="{{ asset('css/about-contact.css') }}">
@endsection
@section('content')


<!-- About Section-->
<section class="page-section bg-primary text-white mb-0" id="about">
    <div class="container">
        <!-- About Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-white">About</h2>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
        </div>
        <!-- About Section Content-->
        <div class="row">
            <div class="col-lg-4 ml-auto"><p class="lead text-white">This site was created by Judy Abi Nehme to test his Laravel skills.</p></div>
            <div class="col-lg-4 mr-auto"><p class="lead text-white">He's worked on the backend, and the frontend!</p></div>
        </div>
        <div class="row">
            <div class="col m-auto"><p class="lead text-white text-center">So far I know: php, blade, js, jquery, and css. I aim to design sites with a clean code and an attractive look.</p></div>
        </div>

    </div>
</section>
@endsection
