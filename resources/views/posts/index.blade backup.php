@extends('layouts.judylayout')
@section('title', 'Posts')
@section('content')


    <div class="col-sm-6 mb-2">
        <h1 class="m-0 text-dark">Here we go!</h1>
    </div>

    @if (count($posts))

            @foreach($posts as $post)
                <div class="postholder mb-0 mt-4">
                    <div class="row">
                        <div class="col-2" style="text-align: center; center ">
                            {{--was using col-md-2 but it was causing stacking problems--}}
                            @if ($post->image)
                            <img src="{{ asset('storage/images/'.$post->image) }}" class="image-responsive" style="max-width:100%; max-height:20vh";>
                            @else
                            No Image!
                            @endif
                        </div>

                        <div class="col-9">{{ $post->description }}</div>

                    </div>
                </div>
                posted by <strong><a href="/profile/{{ $post->user->id }}">{{ $post->user->name }}</a></strong> {{ $post->created_at->diffForHumans() }}
            @endforeach

    @else
        <div class="ml-3 mt-3">
            <p>No Posts found! Consider posting.</p>
        </div>
    @endif



@endsection
