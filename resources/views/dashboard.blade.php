@extends('frontend.layouts.template')
@push('js')
    <script>
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
                    id_menu: 1,
                    sumbu_x: x,
                    sumbu_y: y,
                },
                success: function(data) {
                    console.log(data);
                }
            });

        });
    </script>
@endpush
@section('frontend.content')
    <!-- slider -->
    <section class="home-slider my-5">
        <div class="container-fluid">
            <!-- Slider main container -->
            <div class="swiper swiperBanner">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    @foreach ($agallery as $item)
                        <!-- Slides -->
                        <div class="swiper-slide">
                            <img src="{{ $item->gambar }}" class="" alt="" srcset="">
                        </div>
                    @endforeach
                </div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

            </div>
            <!-- end slider main container -->
        </div>
    </section>
    <!-- end slider -->

    <!-- featured -->
    <section class="section-features my-6">
        <div class="container">
            <div class="text-center">
                <h4>Mengapa Memilih Kami</h4>
                <p>Pilihan yang tepat dan harga yang bersahabat</p>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-3">
                    <div class="d-flex">
                        <img src="{{ asset('frontend/img/icon/icon-time.svg') }}" class="img-fluid w-25" alt="">
                        <div class="align-self-center">
                            <h5>Kapan Saja</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="d-flex">
                        <img src="{{ asset('frontend/img/icon/icon-location.svg') }}" class="img-fluid w-25" alt="">
                        <div class="align-self-center">
                            <h5>Dimana Saja</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="d-flex">
                        <img src="{{ asset('frontend/img/icon/icon-dolar.svg') }}" class="img-fluid w-25" alt="">
                        <div class="align-self-center">
                            <h5>Harga Terjangkau</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="d-flex">
                        <img src="{{ asset('frontend/img/icon/icon-hd.svg') }}" class="img-fluid w-25" alt="">
                        <div class="align-self-center">
                            <h5>Kualitas Terbaik</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end featured -->

    <!-- services -->
    <section class="section-services my-6">
        <div class="container">
            <div class="text-center">
                <h4>Jasa yang kami tawarkan </h4>
                <p>Semua ada disini</p>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow p-3 mb-5 bg-body rounded" style="border: none;">
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('frontend/img/icon/icon-food.svg') }}" class="img-fluid w-25 w-25"
                                    alt="">
                            </div>
                            <div class="text-center my-4">
                                <h5>Jamur Konsumsi</h5>
                                <p>Menyediakan Produk Jamur Tiram Putih Siap Konsumsi</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow p-3 mb-5 bg-body rounded" style="border: none;">
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('frontend/img/icon/icon-jamur.svg') }}" class="img-fluid w-25"
                                    alt="">
                            </div>
                            <div class="text-center my-4">
                                <h5>Jamur Hias</h5>
                                <p>Menyediakan Produk Jamur Sebagai Hiasan yang Indah</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow p-3 mb-5 bg-body rounded" style="border: none;">
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('frontend/img/icon/icon-mitra.svg') }}" class="img-fluid w-25"
                                    alt="">
                            </div>
                            <div class="text-center my-4">
                                <h5>Mitra Jamur</h5>
                                <p>Menyediakan Kerja Sama (Mitra) dalam Produksi Jamur</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow p-3 mb-5 bg-body rounded" style="border: none;">
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('frontend/img/icon/icon-free.svg') }}" class="" height="72px"
                                    alt="">
                            </div>
                            <div class="text-center my-4">
                                <h5>Free Ongkir</h5>
                                <p>Gratis Ongkos Kirim Se-Kabupaten Bondowoso</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow p-3 mb-5 bg-body rounded" style="border: none;">
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('frontend/img/icon/icon-browser.svg') }}" class="img-fluid w-25"
                                    alt="">
                            </div>
                            <div class="text-center my-4">
                                <h5>Log Jamur</h5>
                                <p>Menyediakan Produk Log Jamur (Tahap Produksi)</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow p-3 mb-5 bg-body rounded" style="border: none;">
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('frontend/img/icon/icon-produksi.svg') }}" class="img-fluid w-25"
                                    alt="">
                            </div>
                            <div class="text-center my-4">
                                <h5>Alat Produksi</h5>
                                <p>Menyediakan Alat Produksi Jamur Siap Konsumsi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end services -->

    <!-- produk -->
    <div class="section-produk my-6 position-relative"
        style="background-image: url('{{ asset('frontend/img/galeri/back-jamur.png') }}');
                                                                                                                                                                                                                        background-repeat: no-repeat;
                                                                                                                                                                                                                        background-size: cover;
                                                                                                                                                                                                                        background-position: center;
                                                                                                                                                                                                                        backdrop-filter: blur(5px);
                                                                                                                                                                                                                        height:600px;">
        <div class="container">
            <div class="text-center pt-5">
                <h4 style="font-size: 28px;">Coba Produk Unggulan Kami</h4>
                <p>Sekarang Anda akan mendapatkan sensasi dengan Cita Rasa SPESIAL dari Produk Jamur <br> Unggulan Kami</p>
            </div>
            <div class="d-flex justify-content-center produk-button">
                <a href="{{ route('produk') }}" class="btn btn-light">Lihat Produk Kami</a>
            </div>
        </div>
    </div>
    <!-- end produk -->
    <!-- Galeri -->
    <section class="section-galery">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="text-center">
                                <h4>Galeri</h4>
                                <p>Aktif, Kreatif, dan Variatif</p>
                            </div>
                            <div class="swiper swiperGaleri">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- Slides -->
                                    @foreach ($ogallery as $item)
                                        <div class="swiper-slide"><img src="{{ $item->gambar }}" class="img-fluid"
                                                alt=""></div>
                                    @endforeach
                                </div>
                                <!-- If we need pagination -->
                                <div class="swiper-pagination"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end galeri -->

    <!-- contact -->
    <section class="section-contact my-6">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body p-6">
                            <div class="row">
                                <div class="col-md-8">
                                    <h4 class="heading-title">Pesan Jamur Di Kami,<br>
                                        <span class="heading-span">MURAH</span> gaes!!
                                    </h4>
                                    <p>Anda bisa membeli jamur jenis konsumsi, hias, <br>
                                        bahkan menjadi mitra kami</p>
                                </div>
                                <div class="col-md-4 d-flex align-items-center">
                                    <a href="{{ route('kontak') }}" class="btn btn-primary"> Hubungi Kami </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact  -->

    <!-- saran -->
    <section class="section-saran my-6">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto card">
                    <div class="card-body p-4">
                        <div class="row py-4">
                            <div class="col-md-6 back-contact">
                                <div class="section-saran-title p-4">
                                    <h4>Kritik <br> dan Saran</h4>
                                    <p>Kritikmu adalah hadiah untukku dan Saranmu adalah masa depanku</p>
                                </div>
                            </div>
                            <div class="col-md-6 align-self-center">
                                <form action="{{ route('feedback-front') }}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-md-6 mb-4">
                                            <input type="text" placeholder="Nama Depan" id="nama_depan"
                                                name="nama_depan" class="form-control" required>
                                            @error('nama_depan')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <input type="text" placeholder="Nama Belakang" id="nama_belakang"
                                                name="nama_belakang" class="form-control" required>
                                            @error('nama_belakang')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="Saran" id="saran" name="saran" cols="30" rows="10"
                                            maxlength="225" required></textarea>
                                        @error('saran')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-end mt-4">
                                        <button type="submit" class="btn btn-primary"> Kirim </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end saran -->
    <div class="container-fluid d-flex justify-content-end fixed-bottom p-4 whatsapp">
        <a href="https://api.whatsapp.com/send?phone={{ $dashboard->whatsapp }}" target="_blank"
            class="btn btn-success"><i class="fab fa-whatsapp"></i></a>
    </div>
@endsection
