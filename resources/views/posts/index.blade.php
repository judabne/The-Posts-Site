@extends('layouts.judylayout')
@section('title', 'Posts')
@section('content')

    <div class="col-sm-6 mb-2">
        <h1 class="m-0 text-dark">Here we go!</h1>
    </div>

    @if (count($posts))
        <div class="row">
        @foreach($posts as $post)

            <div class="col-sm-6 col-md-4 mb-4">
                <div class="card mb-4 text-white bg-dark" style="height: 100%">
                    {{--I added the height: 100% so that the three cards have the same height next to each other--}}
                    @if ($post->image)
                        <img class="card-img-top post-image" src="{{ asset('storage/images/'.$post->image) }}">
                    @else
                        <img class="card-img-top post-image" src="{{ asset('storage/images/noimage.png') }}" >
                    @endif
                    <div class="card-body">
                        <h5 class="card-title"><a href="/profile/{{ $post->user->id }}">{{ $post->user->name }}</a></h5>
                        <p class="card-text">{{ $post->firstCharacters() }}</p>
                        <div class="d-flex justify-content-between align-self-end">
                            <a href="/post/{{ $post->id }}" class="btn btn-outline-light btn-sm">View full post</a>
                            <small class="text-right">{{ $post->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    @else
        <div class="ml-3 mt-3">
            <p>No Posts found! Consider posting.</p>
        </div>
    @endif
@endsection
