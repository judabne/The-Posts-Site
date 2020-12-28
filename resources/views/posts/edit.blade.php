@extends('layouts.judylayout')
@section('title', 'Edit Post')
@section('content')


    <div class="col-md-6 mb-2">
        <h1 class="m-0 text-dark">Edit your post</h1>
    </div>


    <div class="container-fluid">
    <form method="post" action="{{ route('post.update', $post->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group row">
            <label for="image" class="col-md-3 col-form-label text-md-right">Image</label>
            <div class="col-md-9"><input type="file" name="image"></div>
            <div class="clearfix"></div>

            @if($post->image)
                <div class="col-md-3"><!--blank space--></div>
                <div class="col-md-9">
                    <img src="{{ asset('storage/images/'.$post->image) }}" style="width: 150px";>
                </div>
                <div class="clearfix"></div>
            @endif
        </div>

        <div class="form-group row">
            <label for="description" class="col-md-3 col-form-label text-md-right">Description</label>
                <div class="col-md-6">
                    <textarea name="description" class="form-control text-align-left">{{$post->description}}</textarea>
                    {{--writing the textarea over multiple lines results in empty spaces in it--}}
                </div>
            <div class="clearfix"></div>
        </div>

        <div class="form-group row">
            <div class="col-md-3 "></div>
            <div class="col-md-6">
            <input type="submit" class="btn btn-info" value="Save">
        </div>
    </form>
    </div>


@endsection
