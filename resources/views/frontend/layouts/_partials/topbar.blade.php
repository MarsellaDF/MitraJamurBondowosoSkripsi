<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid mx-1 px-5">
        <a class="navbar-brand d-flex" href="{{ route('dashboard') }}">
            <img src="{{ asset('frontend/img/logo.png') }}" class="img-fluid d-inline-block align-self-center" alt=""
                width="150" height="150">
            <strong>Mitra <br> Jamur <br> Bondowoso</strong>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->segment(1) == '' ? 'active' : '' }}" aria-current="page"
                        href="{{ route('dashboard') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->segment(1) == 'produk' ? 'active' : '' }}" aria-current="page"
                        href="{{ route('produk') }}">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->segment(1) == 'gallery' ? 'active' : '' }}" aria-current="page"
                        href="{{ route('gallery') }}">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->segment(1) == 'tentang' ? 'active' : '' }}" aria-current="page"
                        href="{{ route('tentang') }}">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->segment(1) == 'kontak' ? 'active' : '' }}" aria-current="page"
                        href="{{ route('kontak') }}">Kontak</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@if ($errors->any())
    <div class=" alert alert-danger">
        <strong>Whoops!</strong> Terdapat kesalahan pada input anda.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li> {{ $error }} </li>
            @endforeach
        </ul>
    </div>
@endif

@if (session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
