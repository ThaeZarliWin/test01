
<nav class="navbar navbar-expand-md navbar-light bg-primary shadow-sm">
  <div class="container">
    <a class="navbar-brand text-white" href="{{ url('/') }}">
      SCM BulletinBoard
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto">
      @guest
      @if (Route::has('login'))
      @endif
      @else
        @if(Auth::user()->type == '0')
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('user_list') }}">Users</a>
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link text-white" href="/user_profile">User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('post_list') }}">Post</a>
        </li>
      @endguest
      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
              <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @else
              <li class="nav-item">
                <label class="nav-link text-white" for="AuthUser">
                  {{ Auth::user()->name }}
                </label>
              </li>
              <li class="nav-item">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); 
                document.getElementById('logout-form').submit();" class="btn btn-default nav-link text-white">{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" 
                  style="display: none;">
                  @csrf
                </form>
              </li> 
            @endguest
          </ul>
    </div>
  </div>
</nav>