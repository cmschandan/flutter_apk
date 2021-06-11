<nav id="defaultNav" class="navbar navbar-expand-lg navbar-light py-0" style="background-color:#2d99ca;position:fixed;top:0;right:0;left:0;z-index:1030;">
  <a class="navbar-brand" href="/"><img src="{{asset('images/my-hospital-now.png')}}" alt="Logo" style="width: 138pt; height: 27pt;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <!-- <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="/" style="font-size:17px;">Home <span class="sr-only">(current)</span></a>
      </li>
    </ul> -->

    <ul class="navbar-nav">
        @guest
            <li class="nav-item"><a style="font-size:17px;" href="{{route('login')}}" class="nav-link">Login</a></li>
            <!-- <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li> -->
        @else
        <!-- <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                {{Auth::user()->name}} <span class="caret"></span>
            </a>

           <ul class="dropdown-menu float-right">
                <li class="">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><h4>Logout</h4></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
                </li>
            </ul>
        </li> -->
        @endguest
    </ul>
  </div>
</nav>
