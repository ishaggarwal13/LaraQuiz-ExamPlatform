<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body class="page-header-fixed">

    @include('partials.analytics')

    <!-- Header -->
    <header class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        @include('partials.header')
    </header>

    <div class="clearfix"></div>

    <!-- Main Container -->
    <div class="page-container d-flex">
        <!-- Sidebar -->
        <aside class="page-sidebar-wrapper bg-light">
            @include('partials.sidebar')
        </aside>

        <!-- Content -->
        <main class="page-content-wrapper flex-grow-1">
            <div class="container-fluid page-content py-4">
                <!-- Page Title -->
                @if(isset($siteTitle))
                    <h3 class="page-title">{{ $siteTitle }}</h3>
                @endif

                <!-- Flash Messages -->
                @if (session('message'))
                    <div class="alert alert-info">
                        <p>{{ session('message') }}</p>
                    </div>
                @endif

                <!-- Validation Errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Dynamic Content -->
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Scroll to Top -->
    <button class="scroll-to-top btn btn-primary" style="display: none;">
        <i class="fa fa-arrow-up"></i>
    </button>

    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
</a>

<form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
    @csrf
</form>


    @include('partials.javascripts')
</body>
</html>
