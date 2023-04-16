
<nav class="navbar bg-primary navbar-expand-lg">
    <div class="container text-white ">
        <a class="navbar-brand b-4 text-white " href="/">
            PostsLite
        </a>

        <div class="navbar text-white">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('posts.index'))  text-danger bg-light rounded fw-bold @else text-white @endif" href="{{route('posts.index')}}">Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('posts.create')) text-danger bg-light rounded fw-bold @else text-white @endif" href="{{route('posts.create')}}">New Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('posts.trashed')) text-danger bg-light rounded fw-bold @else text-white @endif" href="{{route('posts.trashed')}}">Trashed</a>
                </li>
                <li class="nav-item mx-4">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Log out</button>
                    </form>
                </li>
            </ul>

        </div>
    </div>
</nav>


