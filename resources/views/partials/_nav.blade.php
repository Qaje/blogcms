    <!-- Bootstrap navbar default-->
        <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="#">Laravel Blog</a>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class=" nav-item active">
                <a class=" nav-link" href="{{ route('pages.welcome')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class=" nav-item active">
                  <a class="nav-link" href="{{ route('blog.index')}}">Blog <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact">Contact</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" href="#">Disabled</a>
                </li>
                 @if(Auth::check())
                  <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Hello {{ Auth::user()->name}}
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    
                    <a class="dropdown-item" href="{{ route('posts.index')}}">Posts</a>
                    <a class="dropdown-item" href="{{ route('categories.index')}}">Categories</a>
                    <a class="dropdown-item" href="{{ route('tags.index')}}">Tags</a>
                    <!--start naav logout--> 
                    <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    
                    <!--end nav logout-->
                  </div>
                </li>
                @else
                <li>
                <a class="btn btn-default" href="{{route('login')}}">Login</a>
                </li>
                @endif
              </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="text" placeholder="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
          </div>
        </nav>