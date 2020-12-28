@extends('layouts.judylayout')

@section('content')
<div class="col-sm-6 mb-2">
    <h1 class="m-0 text-dark">Change Password</h1>
</div>

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="jumbotron">
    <form method="POST" action="{{ route('changeEmail') }}">
        @csrf

        <div class="form-group row">
            <label for="new-email" class="col-md-4 col-form-label text-md-right">New Email</label>

            <div class="col-md-6">
                <input id="new-email" type="email" class="form-control" name="new-email" required>

                @if ($errors->has('new-email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('new-email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="new-email-confirm" class="col-md-4 col-form-label text-md-right">Confirm New Email</label>

            <div class="col-md-6">
                <input id="new-email-confirm" type="email" class="form-control" name="new-email_confirmation" required>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-info">
                    Change Email
                </button>
            </div>
        </div>

    </form>
</div>

@endsection

