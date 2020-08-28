<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0" style="font-size: 18px">
        <li class="nav-item my-auto">
            {{-- @dd(Lang::locale()) --}}
            {{-- @dd(App::isLocale('bn')) --}}
            <span><i class="fas fa-globe-asia"></i></span>
          <select class="local" id="locale">
              <option {{Lang::locale()=='en'?'selected':''}} value="en">English</option>
              <option {{Lang::locale()=='bn'?'selected':''}} value="bn">Bangla</option>
          </select>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">somtehing</a>
        </li>
</ul>
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0" style="font-size: 18px">
            @auth
            <li class="nav-item">
                <a class="nav-link btn btn-sm btn-primary text-white p-1 mr-1" href="{{route('user.home')}}">
                    {{__('system.dashboard')}} <span> <i class="fas fa-home"></i> </span>
                </a>
              </li>
            <li class="nav-item">
                <a class="nav-link btn btn-sm btn-primary text-white p-1 mr-1" href="{{route('user.blog.create')}}">
                    {{__('system.add_new')}} <span> <i class="fas fa-plus-square"></i> </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-sm btn-danger text-white p-1 ml-1" href="{{route('user.blog.trash')}}">
                    {{__('system.view_trash')}} <span> <i class="fas fa-dumpster"></i> </span>
                </a>
              </li>
            <li class="nav-item">
                <a class="nav-link btn btn-sm btn-info text-white p-1 ml-1" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('login.logout') }}  <span> <i class="fas fa-sign-out-alt"></i> </span>
                                    </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
              </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}"> {{__('login.login')}} </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('register')}}">{{__('system.register')}}</a>
                  </li>
            @endauth
    </ul>
</nav>
