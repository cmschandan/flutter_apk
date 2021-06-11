    
  <div class="">
    <nav class="navbar navbar-inverse fixed-top mt-5" id="sidebar-wrapper" role="navigation">
         <ul class="nav sidebar-nav">
           <div class="sidebar-header">
             <div class="sidebar-brand">
               <a href="#">{{Auth::user()->name}}</a>
             </div>
           </div>
           <li><a href="{{route('add.doctor.profile')}}"><i class="fa fa-user-plus" aria-hidden="true"></i> Add Details</a></li>
           <li><a href=""><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
           <li> 
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
                </li>
          </ul>
      </nav>
  </div>
