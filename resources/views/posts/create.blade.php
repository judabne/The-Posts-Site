@extends('layouts.judylayout')
@section('title', 'Create Post')
@section('content')



    <div class="col-md-6 mb-2">
        <h1 class="m-0 text-dark">Add a post</h1>
    </div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="container mt-3">
        <form method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label for="image" class="col-md-3 col-form-label text-md-right">Image</label>
                <div class="col-md-6"><input type="file" name="image"></div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-md-3 col-form-label text-md-right">Description</label>
                <div class="col-md-6">
                    <textarea name="description" class="form-control"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-3 "></div>
                <div class="col-md-6">
                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </div>
        </form>
    </div>

@endsection

