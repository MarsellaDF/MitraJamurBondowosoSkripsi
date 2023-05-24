<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.layouts._partials.head')
</head>

<body>
    <script>
        let timehours;
        let timeminutes;
        let timeseconds;
        let startTimeD;
        let startTimeP;
        let startTimeG;
        let startTimeT;
        let startTimeK;

        var segment = window.location.pathname;

        if (segment == '/') {
            if (!startTimeD) {
                startTimeD = Date.now().toString();
            }
        } else if (segment == '/produk') {
            if (!startTimeP) {
                startTimeP = Date.now().toString();
            }
        } else if (segment == '/gallery') {
            if (!startTimeG) {
                startTimeG = Date.now().toString();
            }
        } else if (segment == '/tentang') {
            if (!startTimeT) {
                startTimeT = Date.now().toString();
            }
        } else if (segment == '/kontak') {
            if (!startTimeK) {
                startTimeK = Date.now().toString();
            }
        }

        // Fungsi untuk menghitung durasi halaman
        function calculateDuration() {
        if (segment == '/') {
            var endTime = Date.now();
            var duration = endTime - parseInt(startTimeD);
        } else if (segment == '/produk') {
            var endTime = Date.now();
            var duration = endTime - parseInt(startTimeP);
        } else if (segment == '/gallery') {
            var endTime = Date.now();
            var duration = endTime - parseInt(startTimeG);
        } else if (segment == '/tentang') {
            var endTime = Date.now();
            var duration = endTime - parseInt(startTimeT);
        } else if (segment == '/kontak') {
            var endTime = Date.now();
            var duration = endTime - parseInt(startTimeK);
        }

        var seconds = Math.floor(duration / 1000);
        timeseconds = seconds;
        console.log("Durasi halaman: " + seconds + " milidetik");
        }

        // Event saat pengguna berpindah ke halaman lain
        window.addEventListener("beforeunload", calculateDuration);


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
            var scrolly = document.body.clientHeight;

            console.log("Scroll Koordinat X: " + scrollx);
            console.log("Scroll Koordinat Y: " + scrolly);

            calculateDuration();

            // Mengirim pesan ke elemen induk dengan data koordinat
            parent.postMessage({
                x: xCoordinate,
                y: yCoordinate,
                screenWidth: screenx,
                screenHeight: screeny,
                scrollHorizontal: scrollx,
                scrollVertical: scrolly,
                body: segment,
                timeseconds:timeseconds,
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
