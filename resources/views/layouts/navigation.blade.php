<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top" aria-label="Fourth navbar example">
    <div class="container-fluid">
        <a class="navbar-brand" href="/" style="max-width: 200px">
            @include('layouts.logo')
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04"
                aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample04">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">
                        @auth()
                            My Dashboard
                        @else
                            The Security Village
                        @endif
                    </a>
                </li>
                @auth()
                    @if(Auth::user()->admin)
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/admin/dashboard">
                                Admin
                            </a>
                        </li>
                    @endif
                @endif
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" data-bs-toggle="dropdown" aria-expanded="false">
                        Die Wilgers
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="/#wilgersDiv">About Die Wilgers</a></li>
                        {{-- <li><a class="dropdown-item" href="/#services">Services</a></li> --}}
                        <li><a class="dropdown-item" href="/importantContacts">Important Contacts</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" data-bs-toggle="dropdown" aria-expanded="false">
                        Other
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="/importantContacts">Important Contacts</a></li>
                    </ul>
                </li>
{{--                <li class="nav-item dropdown">--}}
{{--                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Security</a>--}}
{{--                    <ul class="dropdown-menu dropdown-menu-end">--}}
{{--                        <li><a class="dropdown-item" href="/security#village">Security Village</a></li>--}}
{{--                        <li><a class="dropdown-item" href="/security#cameras">Cameras</a></li>--}}
{{--                        <li><a class="dropdown-item" href="/security#enclosure">Enclosures</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link active" aria-current="page" href="/#supportUs">Support Us</a>--}}
{{--                </li>--}}
            </ul>

            <ul class="navbar-nav mb-2 mb-md-0">
                @auth()
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                           aria-expanded="false">{{Auth::user()->name}}</a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="/account">My Account</a></li>
                            {{--                            <li><a class="dropdown-item" href="#">Another action</a></li>--}}
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/logout">Log Out</a></li>

                        </ul>

                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/register"
                           aria-expanded="false">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login"
                           aria-expanded="false">Login</a>
                    </li>

                @endauth
            </ul>
        </div>
    </div>
</nav>
