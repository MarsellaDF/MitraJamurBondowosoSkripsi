<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.layouts._partials.head')
</head>

<body>
    <header class="header">
        @include('frontend.layouts._partials.topbar')
    </header>
    <main class="main">
        @yield('frontend.content')
    </main>
    <footer class="footer-content" role="">
        @include('frontend.layouts._partials.footer')
    </footer>
</body>
<!-- bootstrap js  -->
<!-- bootstrap js  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- swipper js -->
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<!-- galeri -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<!-- custom-js -->
<script>
    baguetteBox.run('.section-galeri');
</script>
<script src="{{ asset('frontend/js/custom.js') }}"></script>
@stack('js')

</html>
