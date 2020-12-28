@extends('layouts.judylayout')
@section('title', 'Own Posts')
@section('content')


    <div class="col-sm-6 mb-2">
        <h1 class="m-0 text-dark">These are your posts!</h1>
    </div>

    @if (count($posts))

        @foreach($posts as $post)
            <div class="postholder mb-0 mt-4">
                <div class="row">
                    <div class="col-2" style="text-align: center">
                        @if ($post->image)
                        <img src="{{ asset('storage/images/'.$post->image) }}" class="image-responsive" style="max-width:100%; max-height:20vh";>
                        @else
                        No Image!
                        @endif
                    </div>
                    <div class="col-9">{{ $post->description }}</div>
                    <div class="col-1">
                        <a href="{{ route('post.edit', $post->id) }}" class="text-success">Edit</a>
                        <br>
                        <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="text-danger">Delete</a>
                            <form action="{{ route('post.destroy', $post->id) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <!-- or instead of the onclick and javascript stuff put a submit button here -->
                            </form>
                    </div>
                </div>
            </div>
            posted: {{ $post->created_at->diffForHumans() }}
        @endforeach

    @else
        <div class="ml-3 mt-3">
            <p>No Posts found! This is the right time to add some.</p>
        </div>

    @endif



@endsection

