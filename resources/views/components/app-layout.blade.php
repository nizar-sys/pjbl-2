@props(['title'])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/scss/app.scss')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>{{ $title }}</title>
</head>

<body>
    <div id="container">
        <div class="aside__overlay"></div>
        <div class="aside">
            <div class="aside__wikrama">
                <img src="/img/wikrama.png" alt="Wikrama" />
                <span>WIKRAMA</span>
            </div>
            <div class="aside__links">
                @if (auth()->user()->is_teacher)
                    <a class="aside__link {{ Route::currentRouteNamed('dashboard.grades.*') ? 'active' : '' }}"
                        href="{{ route('dashboard.grades.index') }}">
                        <i class="bi bi-boxes"></i>
                        Rombel
                    </a>
                    <a class="aside__link {{ Route::is('dashboard.regions.*') ? 'active' : '' }}"
                        href="{{ route('dashboard.regions.index') }}">
                        <i class="bi bi-map"></i>
                        Rayon
                    </a>
                    <a class="aside__link {{ Route::is('dashboard.categories.*') ? 'active' : '' }}"
                        href="{{ route('dashboard.categories.index') }}">
                        <i class="bi bi-tags"></i>
                        Paket Soal
                    </a>
                    <a class="aside__link {{ Route::is('dashboard.activities.*') ? 'active' : '' }}"
                        href="{{ route('dashboard.activities.index') }}">
                        <i class="bi bi-command"></i>
                        Soal
                    </a>
                    <a class="aside__link {{ Route::is('dashboard.input-form.*') ? 'active' : '' }}"
                        href="{{ route('dashboard.input-form.index') }}">
                        <i class="bi bi-arrow-through-heart"></i>
                        Form
                    </a>
                    <a class="aside__link {{ Route::is('dashboard.input-table.*') ? 'active' : '' }}"
                        href="{{ route('dashboard.input-table.index') }}">
                        <i class="bi bi-activity"></i>
                        Table
                    </a>
                @else
                <a class="aside__link {{ Route::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <i class="bi bi-house"></i>
                    Dashboard
                </a>
                <a class="aside__link {{ Route::is('dashboard.centang.*') ? 'active' : '' }}"
                        href="{{ route('dashboard.centang.index') }}">
                        <i class="bi bi-activity"></i>
                        Pedagogik
                </a>
                <a class="aside__link {{ Route::is('dashboard.pendidik.*') ? 'active' : '' }}"
                        href="{{ route('dashboard.pendidik.index') }}">
                        <i class="bi bi-activity"></i>
                        Pendidik
                </a>
                <a class="aside__link {{ Route::is('dashboard.pendidik2.*') ? 'active' : '' }}"
                        href="{{ route('dashboard.pendidik2.index') }}">
                        <i class="bi bi-activity"></i>
                        Pendidik
                </a>
                    {{-- <a class="aside__link {{ Route::is('dashboard.daily.*') ? 'active' : '' }}"
                        href="{{ route('dashboard.daily.index') }}">
                        <i class="bi bi-arrow-through-heart"></i>
                        Form Pembiasaan
                    </a>
                    <a class="aside__link {{ Route::is('dashboard.activity.*') ? 'active' : '' }}"
                        href="{{ route('dashboard.activity.index') }}">
                        <i class="bi bi-activity"></i>
                        Form Aktivitas
                    </a> --}}
                @endif
            </div>
        </div>
        <div class="main">
            <nav class="mynav">
                <button class="btn btn-link text-dark mynav__toggle d-lg-none">
                    <i class="bi bi-list fs-3"></i>
                </button>
                <div class="mynav__search">
                    <i class="bi bi-search"></i>
                    <input type="search" name="search" id="search" placeholder="search..." />
                </div>
                <div class="dropdown">
                    <button class="mynav__dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="/img/wikrama.png" alt="" />
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <a onclick="event.preventDefault();
                                this.closest('form').submit();"
                                    class="dropdown-item text-danger" href="#">
                                    Logout
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="content">
                {{ $slot }}
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    @vite('resources/js/app.js')
</body>

</html>
