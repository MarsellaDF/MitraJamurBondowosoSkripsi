@extends('frontend.layouts.template')
@push('js')
    <script>
        let timehours;
        let timeminutes;
        let timeseconds;

        var startTime;

        // Saat halaman dimuat
        function onPageLoad() {
            startTime = Date.now();
        }

        // Saat pengguna meninggalkan halaman
        function onPageUnload() {
            var endTime = Date.now();
            var duration = endTime - startTime;

            // Konversi durasi ke format yang sesuai
            var seconds = Math.floor(duration / 1000);
            var minutes = Math.floor(seconds / 60);
            var hours = Math.floor(minutes / 60);

            // Tampilkan durasi
            timehours = hours;
            timeminutes = minutes;
            timeseconds = seconds;
            console.log("Durasi halaman: " + hours + " jam, " + minutes + " menit, " + seconds + " detik");
        }

        // Menjalankan fungsi onPageLoad() saat halaman dimuat
        window.addEventListener("load", onPageLoad);

        // Menjalankan fungsi onPageUnload() saat pengguna meninggalkan halaman
        window.addEventListener("beforeunload", onPageUnload);
    </script>
    {{--  <script>
        // Add event listener to the document for a click event
        document.addEventListener('click', function(event) {
            // Mendapatkan koordinat x dan y
            var x = event.clientX;
            var y = event.clientY;

            // log koordinat ke konsol
            // simpan data disini
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{ route('test.post') }}",
                data: {
                    id_menu: 5,
                    sumbu_x: x,
                    sumbu_y: y,
                },
                success: function(data) {
                    console.log(data);
                }
            });

        });
    </script>  --}}
@endpush
@section('frontend.content')
    {{--  <div id="timer">00:00:00</div>
    <script>
        // Mendapatkan elemen dengan ID "timer"
        var timerElement = document.getElementById('timer');

        // Mengatur waktu awal
        var seconds = 0;
        var minutes = 0;
        var hours = 0;

        // Mengatur interval untuk update setiap detik
        var timer = setInterval(function() {
            // Menambahkan 1 detik ke variabel seconds
            seconds++;

            // Menampilkan waktu pada elemen dengan ID "timer"
            timerElement.textContent = seconds;
        }, 1000);

        // Menghentikan timer setelah 10 detik
          setTimeout(function() {
            clearInterval(timer);
        }, 10000);
    </script>  --}}

    <!-- produk -->
    <div class="section-produk">
        <div class="container">
            <div class="row position-relative">
                <div class="col-md-4 align-self-center" style="position:relative; right:-200px; z-index:1;">
                    <div class="card shadow-sm p-3 mb-5 bg-body rounded">
                        <div class="card-body">
                            <h4 class="fs-2 fw-bolder">Mitra Jamur <br>
                                Bondowoso</h4>
                            <div class="text-center">
                                <p>
                                    {{ $dashboard->deskripsi }}
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-8 card ">
                    <div class="position-absolute"
                        style="background-color:rgba(0, 0, 0, 0.5)000; width: 600px; height: 450px; z-index: 90">
                    </div>
                    <iframe class="shadow-sm p-3 mb-5 bg-body rounded" src="{{ $dashboard->alamat }}" width="600"
                        height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow-sm p-3 mb-5 bg-body rounded">
                        <div class="d-flex">
                            <img src="{{ asset('frontend/img/galeri/owner.png') }}" class="img-fluid" width="200px"
                                height="50px" alt="...">
                            <div class="px-4 align-self-center">
                                <h5 class="card-title fs-2">Syair Hamsyah</h5>
                                <p class="card-text">Owner Mitra Jamur Tiram Putih Bondowoso</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow-sm p-3 mb-5 bg-body rounded">
                        <div class="card-body text-center">
                            <p>
                                “Ambillah risiko yang lebih besar dari apa yang dipikirkan orang lain aman. Berilah
                                perhatian lebih dari apa yang orang lain pikir bijak. Bermimpilah lebih dari apa yang orang
                                lain pikir masuk akal”
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow-sm p-3 mb-5 bg-body rounded">
                        <div class="card-body section-kontak-kami">
                            <div class="d-flex justify-content-start footer-sosmed">
                                <div class="d-flex flex-column">
                                    <div class="mb-3">
                                        <a href="tel:+{{ $dashboard->whatsapp }}" target="_blank">
                                            <i class="fa-solid fa-phone"></i> <span
                                                class="px-2">+{{ $dashboard->whatsapp }}</span>
                                        </a>
                                    </div>
                                    <div class="mb-3">
                                        <a href="mailto:{{ $dashboard->gmail }}" target="_blank">
                                            <i class="fa-solid fa-envelope"></i> <span
                                                class="px-2">{{ $dashboard->gmail }}</span>
                                        </a>
                                    </div>
                                    <div class="mb-3">
                                        <a href="https://goo.gl/maps/DwHwTDkdvjTWxAHa9" target="_blank">
                                            <i class="fa-solid fa-location-dot"></i> <span class="px-2">Bondowoso</span>
                                        </a>
                                    </div>
                                    <div class="mb-3">
                                        <a href="https://wa.me/{{ $dashboard->whatsapp }}" target="_blank">
                                            <i class="fa-brands fa-whatsapp"></i> <span
                                                class="px-2">+{{ $dashboard->whatsapp }}</span>
                                        </a>
                                    </div>
                                    <div class="mb-3">
                                        <a href="{{ $dashboard->facebook }}" target="_blank">
                                            <i class="fa-brands fa-facebook-f"></i> <span class="px-2">Mitra Jamur
                                                Bondowoso</span>
                                        </a>
                                    </div>
                                    <div class="mb-3">
                                        <a href="{{ $dashboard->youtube }}" target="_blank">
                                            <i class="fa-brands fa-youtube"></i> <span class="px-2">Jamur Ijen
                                                Raung</span>
                                        </a>
                                    </div>
                                    <div class="mb-3">
                                        <a href="{{ $dashboard->twitter }}" target="_blank">
                                            <i class="fa-brands fa-twitter"></i> <span class="px-2">Syair
                                                Vinci</span>
                                        </a>
                                    </div>
                                    <div class="mb-3">
                                        <a href="{{ $dashboard->instagram }}" target="_blank">
                                            <i class="fa-brands fa-instagram"></i> <span class="px-2">Syair De
                                                Vinci</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- end produk -->

    <div class="container-fluid d-flex justify-content-end fixed-bottom p-4 whatsapp">
        <a href="https://api.whatsapp.com/send?phone={{ $dashboard->whatsapp }}" class="btn btn-success"><i
                class="fab fa-whatsapp"></i></a>
    </div>
@endsection
