<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}">Online Shopping </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check() && Auth::user()->hasRole('admin'))
                <li><a href="{{url('admin/user')}}">Admin Dashboard</a></li>
                @endif
                <li>
                    <a href="{{url('cart')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;
                        <span class="badge text-center">
                        
                            @if(session()->get("cart"))
                                {{count(session()->get("cart"))}}
                            @endif
                            
                            </span>

                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;
                        @if(Auth::check())
                            {{Auth::user()->name}}
                            @endif


                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                       @if(Auth::check())
                            <li><a href="{{url('users/profile')}}">Profile</a></li>
                            <li><a href="{{url('users/logout')}}">Logout</a></li>
                           @else

                            <li><a href="{{url('users/login')}}">Login</a></li>
                            <li><a href="{{url('users/register')}}">Register</a></li>
                         @endif

                    </ul>
                </li>
                </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>