   @if (session('success'))
    <div class="error-cont">
        <span class="alert-error" id="alert-error">{{ session('success') }}</span>
    </div>
    @endif
<header class="header-navbar"> 
    <nav class="nav-navbar">
        <ul class="ul-navbar">
            <li class="navbar"><a href="{{ route('home') }}">Sobre Mi</a></li>
            <li class="navbar">|</li>
            <li class="navbar"><a id="contactame" href="#div-form">Contactame</a></li>
            <li class="navbar">|</li>
           @Auth
            <form style="display: inline ; margin:0px" action="{{ route('login.logout') }}" method="POST">
            @csrf
            <li class="navbar"><a href="#" onclick="this.closest('form').submit()">Logout</a></li>
            <li class="navbar">|</li>
            <li  class="navbar"><a href="{{ route('admin') }}">Admin</a></li>
            </form>
            @else
            <li class="navbar"><a href="{{ Route('login')}}">Login</a></li>
            @endAuth
            
        </ul>
    </nav>
</header>