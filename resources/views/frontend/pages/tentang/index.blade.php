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
                    id_menu: 4,
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
    {{--  <div id="timer">00:00:00</div>  --}}
    {{--  <script>
        $(document).ready(function() {
            $.ajax({
                url: 'https://www.website-lain.com',
                success: function(data) {
                    $('#webvw').html(data);
                }
            });
        });

        function timerTime(reset) {
            var seconds = 0;
            var minutes = 0;
            var hours = 0;

            function timer() {
                seconds++;
                if (seconds == 60) {
                    seconds = 0;
                    minutes++;
                }
                if (minutes == 60) {
                    minutes = 0;
                    hours++;
                }
                var sec = seconds < 10 ? "0" + seconds : seconds;
                var min = minutes < 10 ? "0" + minutes : minutes;
                var hr = hours < 10 ? "0" + hours : hours;
            }
            tm = window.setInterval(timer, 1000);
            // setInterval(timer, 1000);
        }
    </script>  --}}
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
        {{--  setTimeout(function() {
            clearInterval(timer);
        }, 10000);  --}}
    </script>

    <div class="section-produk mb-5">
        <div class="breadcrumb-produk text-center">
            <h5 class="">Tentang Kami</h5>
        </div>
        <div class="container my-4">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="produk-heading-dua text-center">
                        <h6>Hai Perkenalkan ini Kami <br>
                            dan Ketahuilah Latar Belakang Kami <br>
                            Semoga Tertarik !</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 mx-auto">
                    <img src="{{ asset('frontend/img/galeri/foto.png') }}" class="img-fluid" alt="">
                    <div class="card shadow-sm p-3 mb-3 bg-body rounded">
                        <div class="card-body text-center">
                            <h4 class="fs-2">Syair Hamsyah</h4>
                        </div>
                    </div>
                    <div class="text-center">
                        <p class="fs-5">Owner Mitra Jamur Tiram Putih Bondowoso</p>
                    </div>
                    <div class="card shadow-sm p-3 mb-3 bg-body rounded">
                        <div class="card-body text-center">
                            <h4 class="fs-3 fw-bolder">Visi & Misi </h4>
                        </div>
                    </div>
                    <div>
                        <p style="font-size: 15px;">1.Menciptakan lapangan pekerjaan di desa <br>
                            2.Membuat produk unggulan desa <br>
                            3.Pemasaran berbasis online</p>
                    </div>
                    <div class="card shadow-sm p-3 mb-3 bg-body rounded">
                        <div class="card-body text-center">
                            <h4 class="fs-3 fw-bolder">Tahun Berdiri </h4>
                        </div>
                    </div>
                    <div>
                        <p class="text-center" style="font-size: 15px;">17 April 2016</p>
                    </div>
                    <div class="card shadow-sm p-3 mb-3 bg-body rounded">
                        <div class="card-body text-center">
                            <h4 class="fs-3 fw-bolder">Legalitas Usaha </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow-sm p-3 mb-3 bg-body rounded">
                        <div class="card-body text-center">
                            <h4 class="fs-3 fw-bolder">IUMK </h4>
                        </div>
                    </div>
                    <div>
                        <p class="text-center" style="font-size: 15px;">Izin usaha mikro kecil</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm p-3 mb-3 bg-body rounded">
                        <div class="card-body text-center">
                            <h4 class="fs-3 fw-bolder">NIB </h4>
                        </div>
                    </div>
                    <div>
                        <p class="text-center" style="font-size: 15px;">Nomor induk berusaha</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm p-3 mb-3 bg-body rounded">
                        <div class="card-body text-center">
                            <h4 class="fs-3 fw-bolder">DESA </h4>
                        </div>
                    </div>
                    <div>
                        <p class="text-center" style="font-size: 15px;">Surat izin usaha</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mx-auto">
                    <div class="card shadow-sm p-3 mb-3 bg-body rounded">
                        <div class="card-body text-center">
                            <h4 class="fs-3 fw-bolder">Produk </h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- foreach produk -->
            <div class="row">
                @foreach ($produk as $item)
                    <div class="col-md-4">
                        <div class="card shadow-sm p-3 mb-3 bg-body rounded">
                            <div class="card-body text-center">
                                <h4 class="fs-3 fw-bolder">{{ $item->nama }}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- end galeri -->

    <div class="container-fluid d-flex justify-content-end fixed-bottom p-4 whatsapp">
        <a href="https://api.whatsapp.com/send?phone={{ $dashboard->whatsapp }}" target="_blank" class="btn btn-success"><i
                class="fab fa-whatsapp"></i></a>
    </div>
@endsection
