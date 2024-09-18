<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="border-bottom: 2px solid #f8f9fa;">
    <div class="container">
        <!-- Logo and Brand Name with a background color -->
        <a class="navbar-brand fw-bold text-white px-3 rounded" href="/" style="background-color: #007bff;">
            BTeachers
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <!-- Dynamic Profile Link -->
                @auth
                @php
                    // Recupera il profilo dell'utente loggato
                    $profile = Auth::user()->profile;
                @endphp
                    @if($profile)
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.profiles.show') ? 'active text-primary' : '' }}" href="{{ route('admin.profiles.show', ['profile' => $profile->id]) }}">
                                My Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.profile.statistics') ? 'active text-primary' : '' }}" href="{{ route('admin.profile.statistics') }}">
                                Your Statistics
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.sponsors.index') ? 'active text-primary' : '' }}" href="{{ route('admin.sponsors.index') }}">
                                Subscribe
                            </a>
                        </li><li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.messages.index') ? 'active text-primary' : '' }}" href="{{ route('admin.messages.index')}}" aria-current="page">
                                Your Messages
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.reviews.index') ? 'active text-primary' : '' }}" href="{{ route('admin.reviews.index')}}" aria-current="page">
                                Your Reviews
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.profile.payment-history') ? 'active text-primary' : '' }}" href="{{ route('admin.profile.payment-history')}}" aria-current="page">
                                History Payment
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-warning {{ request()->routeIs('admin.profiles.create') ? 'active' : '' }}" href="{{ route('admin.profiles.create') }}">
                                Crea Profilo
                            </a>
                        </li>
                    @endif
                @endauth
            </ul>

            <!-- Right Side Of Navbar (Authentication Links) -->
            <ul class="navbar-nav ms-auto">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('login') ? 'active text-success' : '' }}" href="{{ route('login') }}">
                                {{ __('Login') }}
                            </a>
                        </li>
                    @endif
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('register') ? 'active text-success' : '' }}" href="{{ route('register') }}">
                                {{ __('Register') }}
                            </a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('admin.user.edit')}}"> User</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
