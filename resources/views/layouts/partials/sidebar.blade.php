
<nav id="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('landingpage') }}">
            <h3>
                {{Auth::user() ? Auth::user()->name : "Hello"}}
            </h3>
            <strong>{{Auth::user() ? Auth::user()->initials() : "Hi"}}</strong>
        </a>
    </div>

    <?php
        $segment = Request::segment(1);
    ?>

    <ul class="list-unstyled components">

        <li class="{{ ($segment=="post")? 'active' : '' }}">

            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-copy"></i>
                Posts
            </a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="{{ route('post.index') }}">All Posts</a>
                </li>
                <li>
                    <a href="/post/ownposts">My Posts</a>
                </li>
                <li>
                    <a href="{{ route('post.create') }}">New Post</a>
                </li>
            </ul>
        </li>
        <li class="{{ ($segment=="controlpanel")? 'active' : '' }}">
            <a href="{{ route('controlpanel') }}">
                <i class="fas fa-briefcase"></i>
                Control Panel
            </a>
        </li>
        <li class="{{ ($segment=="about")? 'active' : '' }}">
            <a href="{{ route('about') }}">
                <i class="fas fa-image"></i>
                About
            </a>
        </li>
        <li class="{{ ($segment=="contact")? 'active' : '' }}">
            <a href="{{route('createcontact')}}">
                <i class="fas fa-paper-plane"></i>
                Contact
            </a>
        </li>
    </ul>

</nav>
