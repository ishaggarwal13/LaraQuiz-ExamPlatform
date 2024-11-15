<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body class="page-header-fixed">

    @include('partials.analytics')

    <div class="clearfix" style="margin-top: 10%;"></div>

    <div class="container-fluid">
        @yield('content')
    </div>

    <!-- Scroll to Top Button -->
    <div class="scroll-to-top" style="display: none;">
        <i class="fa fa-arrow-up"></i>
    </div>

    @include('partials.javascripts')

    <script>
        // Optional: Add JavaScript to show/hide the scroll-to-top button based on scroll position
        window.onscroll = function () {
            const scrollTopBtn = document.querySelector('.scroll-to-top');
            if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                scrollTopBtn.style.display = "block";
            } else {
                scrollTopBtn.style.display = "none";
            }
        };
    </script>

</body>
</html>
