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
                    id_menu: 3,
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
    <!-- galeri -->
    <div class="section-produk ">
        <div class="breadcrumb-produk text-center">
            <h5 class="">Galeri</h5>
        </div>
        <div class="container my-4">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="produk-heading-dua text-center">
                        <h6>Dokumentasi Kegiatan Mitra Jamur Bondowoso</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="section-galeri pb-5">
                <div class="row">
                    @foreach ($gallery as $item)
                        <div class="col-sm-12 col-md-4">
                            <a class="lightbox" href="{{ $item->gambar }}">
                                <img src="{{ $item->gambar }}" alt="Bridge">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- end galeri -->

    <div class="container-fluid d-flex justify-content-end fixed-bottom p-4 whatsapp">
        <a href="https://api.whatsapp.com/send?phone={{ $dashboard->whatsapp }}" target="_blank" class="btn btn-success"><i
                class="fab fa-whatsapp"></i></a>
    </div>
@endsection
