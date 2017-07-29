<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="javascript:void(0)">@yield('page_title')</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                
                <li class="dropdown">
                      <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="ti-user"></i>
                            <p>Welcome  {{ Auth::user()->name }}</p>
                            <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a href="{{route('profile')}}">My Profile</a></li>
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                      </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>