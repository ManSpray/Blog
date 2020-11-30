<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Mantas Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item {{ Request::is('regular.home') || Request::is('index') ? 'active' : '' }} ">
                <a class="nav-link" href="{{ route('regular.home') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{ Request::is('regular.about') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('regular.about') }}">About</a>
            </li>
            <li class="nav-item {{ Request::is('regular.blogposts') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('regular.blogposts') }}">Posts</a>
            </li>
        </ul>
    </div>
    </div>
    {{ Auth::user()['name'] }}
    </div>
    </div>
    {{ Auth::user()['nickname'] }}
    </div>

</nav>
