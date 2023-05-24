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
                    id_menu: 2,
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
        <div class="breadcrumb-produk text-center">
            <h5 class="">Produk Kami</h5>
        </div>
        <div class="container my-4">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="produk-heading-dua text-center">
                        <h6>Jamur Tiram Bondowoso <br> Besar dengan Kepercayaan Pelanggan <br> Tumbuh untuk Kepuasan
                            Pelanggan </h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($produk as $item)
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                            <div class="mainflip">
                                <div class="frontside">
                                    <div class="card shadow p-3 mb-5 bg-body rounded">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">{{ $item->nama }}</h5>
                                            <img class=" img-fluid" src="{{ $item->gambar }}" alt="card image">
                                        </div>
                                    </div>
                                </div>
                                <div class="backside">
                                    <div class="card">
                                        <div class="card-body text-center mt-4">
                                            <div class="bg-light p-2 mb-3">
                                                <h5 class="card-title">{{ $item->nama }}</h5>
                                            </div>
                                            <img class=" img-fluid" src="{{ $item->gambar }}" alt="card image">
                                            <!-- <p class="card-text">This is basic card with image on top, title, description and button.This is basic card with image on top, title, description and button.This is basic card with image on top, title, description and button.</p> -->
                                            {{--  <a href="{{ url('produk/detail-produk/' . $item->slug) }}" target="_blank"  --}}
                                            <a href="{{ url('produk/detail-produk/' . $item->slug) }}"
                                                class="btn btn-primary mt-4 text-white">Lihat
                                                produk</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- end produk -->

    <div class="container-fluid d-flex justify-content-end fixed-bottom p-4 whatsapp">
        <a href="https://api.whatsapp.com/send?phone={{ $dashboard->whatsapp }}" target="_blank" class="btn btn-success"><i
                class="fab fa-whatsapp"></i></a>
    </div>
@endsection
