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
                    id_menu: 2,
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
                                            <a href="{{ url('produk/detail-produk/' . $item->slug) }}" target="_blank"
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
