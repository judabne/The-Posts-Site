@extends('layouts.judylayout')
@section('title', 'Welcome')

@section('content')
    <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
      </ol>
      <div class="carousel-inner" role="listbox" style="border-radius: 7px">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url({{ asset('storage/landingimages/image1.jpg') }})">
          <div class="carousel-caption d-none d-md-block">
            <h3 class="display-4">Post Your Ideas</h3>
            <p class="lead" style="color: #fff">This is the place to show your creativity.</p>
          </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url({{ asset('storage/landingimages/image2.jpg') }})">
          <div class="carousel-caption d-none d-md-block">
            <h3 class="display-4">See Ideas</h3>
            <p class="lead" style="color: #fff">Get the chance to see what crossed the minds of others.</p>
          </div>
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url({{ asset('storage/landingimages/image3.jpg') }})">
          <div class="carousel-caption d-none d-md-block">
            <h3 class="display-4">Build a Better World!</h3>
            <p class="lead" style="color: #fff">Sharing is caring. Combining ideas is always fruitful</p>
          </div>
        </div>

        <!-- Slide Four - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url({{ asset('storage/landingimages/image4.jpg') }})">
            <div class="carousel-caption d-none d-md-block">
            <h3 class="display-4">Explore New Features</h3>
            <p class="lead" style="color: #fff">We are constantly updating the site</p>
            </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
    </div>
  </header>

  <!-- Page Content -->
  <section class="py-5">
    <div class="container">
      <h1 class="font-weight-light">Welcome to the Posts Site</h1>
      <p class="lead">This is the place to post whatever crosses your mind. Whether it is a simple idea, a product you designed, or anything you deem worth sharing!</p>
    </div>
  </section>

  <!-- Login Invitation -->
    <section>
        <div class="container">
            <p class="small m-0"><a href="{{ route('post.index') }}">See what others have posted.</a></p>
            @if (Route::has('login'))
                @auth
                        <p class="small m-0"><a href="{{ route('post.create') }}">Show the world what you're up to!</a></p>
                @else
                        <p class="small m-0">What are you waiting for? <strong><a href="{{ route('register') }}">Create an account.</a></strong></p>
                        <p class="small m-0">Already a user? <strong><a href="{{ route('login') }}">Hurry sign in.</a></strong></p>
                @endauth
            @endif
        </div>
    </section>


@endsection
