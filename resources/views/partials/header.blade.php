<header class="header-navbar"> 
    <nav class="nav-navbar">
        <ul class="ul-navbar">
            <li class="navbar"><a href="">Sobre Mi</a></li>
            <li class="navbar">|</li>
            <li class="navbar"><a href="">Contactame</a></li>
            <li class="navbar">|</li>
           @Auth
            <form style="display: inline ; margin:0px" action="{{ route('login.logout') }}" method="POST">
            @csrf
            <li class="navbar"><a href="#" onclick="this.closest('form').submit()">Logout</a></li>
            </form>
            @else
            <li class="navbar"><a href="{{ Route('login')}}">Login</a></li>
            @endAuth
            
        </ul>
    </nav>
</header>