@extends('layouts.judylayout')
@section('title', 'Control Panel')
@section('content')

<div class="col-sm-6 mb-2">
    <h1 class="m-0 text-dark">Control Panel</h1>
</div>



@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            {{ $error }}
            @endforeach
        </ul>
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('infomsg'))
    <div class="alert alert-info">
        {{ session('infomsg') }}
    </div>
@endif

            @if (Route::has('login'))
                <div>
                    @auth
                    <div class="jumbotron">
                        <div class="ml-1 mr-1">
                            <a class="" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>

                    <div class="jumbotron">
                        <form id="changeusername" method="POST" action="{{ route('changeUsername')}}">
                            @csrf
                            <div class="d-flex justify-content-start mb-1">
                                <label for="username" class="col-form-label text-md-left mr-2">Username</label>
                                    <input id="username" name="username" type="text" class="col-md-4 form-control text-align-left" value="{{Auth::user()->name}}">
                            </div>
                        </form>
                        <div class="d-flex justify-content-between">
                            <div class="float-left">
                                <a class="btn-link" href="{{ route('changeemailform') }}">Change email</a><br>
                                <a class="btn-link" href="{{ route('changepasswordform') }}">Change password</a>
                            </div>

                            {{--save changes button for user--}}
                            <div class="float-right">
                                <button type="submit" form="changeusername" class="btn btn-info">Save Changes</button>
                            </div>
                        </div>
                    </div>

                    <div class="jumbotron">
                        <form id="savetheme" method="POST" action="{{ route('theme.save')}}">
                            @csrf
                            <input type="hidden" id="selectedtheme" name="selectedtheme" value="">
                            {{--this way if we save without changing themes the old theme will stay--}}
                        </form>
                        <div class="d-flex justify-content-between">
                            <ul id="theme-list" class="float-left">
                                <li style="color: #7386D5"><a id="style4-0" href="#" onclick="swapStyleSheet('style4-0')">Theme 1</a></li>
                                <li style="color: #3490dc"><a id="style4-1" href="#" onclick="swapStyleSheet('style4-1')">Theme 2</a></li>
                                <li style="color: #e3342f"><a id="style4-2" href="#" onclick="swapStyleSheet('style4-2')">Theme 3</a></li>
                                <li style="color: #38c172"><a id="style4-3" href="#" onclick="swapStyleSheet('style4-3')">Theme 4</a></li>
                            </ul>
                            {{--save changes button for theme--}}
                            <div class="float-right">
                                <button type="submit" form="savetheme" class="btn btn-info">Save Changes</button>
                            </div>
                        </div>
                    </div>

                    {{--if user is not logged in--}}
                    @else
                    <div class="jumbotron">
                        <strong><a href="{{ route('login') }}">Login</a></strong>

                        @if (Route::has('register'))
                            or
                            <strong><a href="{{ route('register') }}">Register</a></strong>
                        @endif
                        . <!--adding a full stop at the end of the sentence-->
                    </div>
                    @endauth
                </div>

            @endif


            <div class="content">
                <!--keeping this for future use-->
            </div>

            <script src="{{ asset('js/change-theme.js') }}" ></script>
@endsection
