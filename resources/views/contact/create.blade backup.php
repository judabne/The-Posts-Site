@extends('layouts.judylayout')
@section('title', 'Contact Us')
@section('content')

<div class="col-sm-6 mb-2">
    <h1 class="m-0 text-dark">Contact Us</h1>
</div>

<div class="container mt-3">
    <form method="post" action="/contact">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-2 col-form-label text-md-right">Name</label>
            <div class="col-md-6"><input type="text" name="name" id="name" class="form-control" {{ old('name') }}></div>
            <div>{{ $errors->first('name') }}</div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>
            <div class="col-md-6"><input type="text" name="email" class="form-control" value="{{ old('email') }}"></div>
            <div>{{ $errors->first('email') }}</div>

        </div>

        <div class="form-group row">
                <label for="message" class="col-md-2 col-form-label text-md-right">Message</label>
                    <div class="col-md-6">
                        <textarea name="message" class="form-control">{{ old('message') }}</textarea>
                    </div>
                    <div>{{ $errors->first('message') }}</div>
        </div>


        <div class="form-group row">
            <div class="col-md-2 "></div>
            <div class="col-md-6">
                <input type="submit" class="btn btn-info" value="Send">
            </div>
        </div>
    </form>
</div>


@endsection
