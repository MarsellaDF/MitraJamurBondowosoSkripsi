<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.layouts._partials.head')
</head>

<body>
    <script>
        // Menambahkan event listener untuk mendeteksi klik pada elemen di dalam iframe
        document.addEventListener("click", handleClick, false);

        // Fungsi yang akan dipanggil saat elemen di dalam iframe diklik
        function handleClick(event) {
            var segment = window.location.pathname;
            console.log("Ini route : " + segment);
            // Mendapatkan koordinat klik pada sumbu x dan sumbu y
            var xCoordinate = event.clientX;
            var yCoordinate = event.clientY;

            var screenx = window.innerWidth;
            var screeny = window.innerHeight;

            var scrollx = document.documentElement.scrollWidth;
            var scrolly = document.documentElement.scrollHeight;

            // Mengirim pesan ke elemen induk dengan data koordinat
            parent.postMessage({
                x: xCoordinate,
                y: yCoordinate,
                screenWidth: screenx,
                screenHeight: screeny,
                scrollHorizontal: scrollx,
                scrollVertical: scrolly,
                body: segment
            }, "*");
        }
    </script>
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
