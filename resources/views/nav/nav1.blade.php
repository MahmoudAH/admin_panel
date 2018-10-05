<nav class="navbar has-shadow" style="background-color: #39CCCC">
  <div class="container">
    <div class="navbar-brand">
    
      <button class="button navbar-burger">
       <span></span>
       <span></span>
       <span></span>
     </button>
    </div>
    <div class="navbar-menu">
      <div class="navbar-start">
        <a class="navbar-item is-tab is-active" href="/admin">admin</a>
      </div> <!-- end of .navbar-start -->


      <div class="navbar-end nav-menu" style="overflow: visible">

        @guest
          <a href="{{route('login')}}" class="navbar-item is-tab">Login</a>
          <a href="{{route('register')}}" class="navbar-item is-tab">register </a>
        @else
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link"> {{Auth::user()->name}}</a>
            <div class="navbar-dropdown is-right" >
             

                             <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                           <i class="fa fa-sign-out" aria-hidden="true"></i>
                                                Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                             </div> 
                       </div>

                                <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"" class="navbar-item is-tab">
                                                     <i class="fa fa-sign-out" aria-hidden="true">
                                                     </i>
                                               </a>
                                               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

             @endguest
      </div>
    </div>
  </div>
</nav>
