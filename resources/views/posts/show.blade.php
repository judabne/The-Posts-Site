@extends('layouts.judylayout')
@section('title', 'Posts')
@section('content')

    <div class="card mb-4 text-white" style="background: #1c5f96" >
        <div class=" d-flex justify-content-center m-1">
        @if ($post->image)
            <a href="{{ asset('storage/images/'.$post->image) }}"><img class="specific-post-image" src="{{ asset('storage/images/'.$post->image) }}"></a>
        @else
            <img class="specific-post-image" src="{{ asset('storage/images/noimage.png') }}">
        @endif
        </div>
        <div class="card-body">
            <h5 class="card-title"><a href="/profile/{{ $post->user->id }}">{{ $post->user->name }}</a></h5>
            <p class="text-white text-justify">{{ $post->description }}</p>
            <div class="d-flex flex-column-reverse">
                <small class="text-right">{{ $post->created_at }}</small>
            </div>
        </div>
    </div>

@endsection
