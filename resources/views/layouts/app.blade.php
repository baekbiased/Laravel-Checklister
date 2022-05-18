<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.1.1/dist/css/coreui.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.5/css/perfect-scrollbar.min.css" integrity="sha512-ygIxOy3hmN2fzGeNqys7ymuBgwSCet0LVfqQbWY10AszPMn2rB9JY0eoG0m1pySicu+nvORrBmhHVSt7+GI9VA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
    @include('partials.sidebar')

    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <header class="header header-sticky mb-4">
            <div class="container-fluid">

                <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
                    <svg class="icon icon-lg">
                        <use xlink:href={{asset("vendors/@coreui/icons/svg/free.svg#cil-menu")}}></use>
                    </svg>
                </button>

                <ul class="header-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('consultation') }}">
                            {{ __('Get Consultation') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('welcome') }}">
                            <svg class="icon icon-lg">
                                <use xlink:href={{asset("vendors/@coreui/icons/svg/free.svg#cil-home")}}></use>
                            </svg>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <svg class="icon icon-lg">
                                <use xlink:href={{asset("vendors/@coreui/icons/svg/free.svg#cil-user")}}></use>
                            </svg>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end pt-0">
                            <div class="dropdown-header bg-light py-2">
                                <div class="fw-semibold">Account</div>
                            </div>
                            <a
                                class="dropdown-item"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <svg class="icon me-2">
                                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
                                </svg> Logout </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>

                </ul>

            </div>
        </header>

        <div class="body flex-grow-1 px-3">
            <div class="container-lg" style="padding-left: 230px">
                <div class="row">
                    @yield('content')

                </div>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.5/perfect-scrollbar.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.1.1/dist/js/coreui.min.js" crossorigin="anonymous"></script>

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
    @yield('scripts')

</body>
</html>
