<nav>
    <ul>
        <li><a href="{{ route('home') }}">Namai</a></li>
        <li><a href="{{ route('conferences.index') }}">Konferencijos</a></li>
        @auth
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Atsijungti</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        @else
            <li><a href="{{ route('login') }}">Prisijungti</a></li>
            <li><a href="{{ route('register') }}">Registruotis</a></li>
        @endauth
    </ul>
</nav>
