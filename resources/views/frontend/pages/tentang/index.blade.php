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
                    id_menu: 4,
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
