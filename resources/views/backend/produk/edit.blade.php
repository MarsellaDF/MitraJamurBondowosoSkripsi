@extends('layouts.template')
@section('content')
    @if ($errors->any())
        <div class=" alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid p-0">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-3"><strong>Produk</strong></h1>
                <a href="{{ route('produk.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i>Lihat Semua Data</a>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h4 class="m-0 font-weight-bold text-primary">Edit Produk</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('produk.update', $produk->id_produk) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="nama">Nama Produk</label>
                                    <input type="text" class="form-control mb-3" id="nama" value="{{ $produk->nama }}"
                                        name="nama">
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga produk</label>
                                    <input type="number" class="form-control mb-3" id="harga" name="harga"
                                        value="{{ $produk->harga }}">
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi produk</label>
                                    <textarea type="text" class="form-control mb-3" id="deskripsi" name="deskripsi">{{ $produk->deskripsi }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar produk</label>
                                    <input type="file" class="form-control-file mb-3" id="gambar" name="gambar"
                                        value="{{ $produk->gambar }}"><br>
                                    <div class="d-flex align-items-start mb-3">
                                        <img width="100px" height="100px" src="{{ url('' . $produk->gambar) }}"
                                            alt=" {{ $produk->name }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select class="form-select mb-3" name="kategori" id="kategori"
                                        class="form-control @error('kategori') is-invalid @enderror">
                                        <option value="Tanaman" @if (old('type', $produk->kategori) === 'Tanaman') selected @endif>Tanaman
                                        </option>
                                        <option value="Alat" @if (old('type', $produk->kategori) === 'Alat') selected @endif>Alat
                                        </option>
                                        <option value="Produk Olahan" @if (old('type', $produk->kategori) === 'Produk Olahan') selected @endif>
                                            Produk Olahan
                                        </option>
                                    </select>
                                    @error('kategori')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-select mb-3" name="status" id="status"
                                        class="form-control @error('status') is-invalid @enderror">
                                        <option value="Tersedia" @if (old('type', $produk->status) === 'Tersedia') selected @endif>Tersedia
                                        </option>
                                        <option value="Tidak Tersedia" @if (old('type', $produk->status) === 'Tidak Tersedia') selected @endif>
                                            Tidak Tersedia
                                        </option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <input type="submit" value="simpan" class="btn btn-primary"></td>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
