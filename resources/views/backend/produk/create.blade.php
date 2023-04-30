@extends('layouts.template')
@section('content')
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
                            <h4 class="m-0 font-weight-bold text-primary">Input Produk</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="nama">Nama Produk</label>
                                    <input type="text" class="form-control mb-3" id="nama"
                                        placeholder="Masukkan Nama Produk" name="nama">
                                    @error('nama')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga Produk</label>
                                    <input class="form-control mb-3" type="number" step="any" class="form-control"
                                        id="harga" name="harga" placeholder="Masukkan Harga Produk"
                                        onkeypress="return hanyaAngka(event)">
                                </div>
                                <div class=" form-group">
                                    <label for="gambar">Gambar Produk</label>
                                    <input type="file" class="form-control-file mb-3" id="gambar" name="gambar">
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi Produk</label>
                                    <textarea type="text" class="form-control mb-3" rows="2" id="deskripsi" name="deskripsi"
                                        placeholder="Masukkan Deskripsi Produk"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select class="form-select mb-3" id="kategori" name="kategori">
                                        <option selected value="0">Pilih Kategori</option>
                                        <option value="Tanaman">Tanaman</option>
                                        <option value="Alat">Alat</option>
                                        <option value="Produk Olahan">Produk Olahan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-select mb-3" id="status" name="status">
                                        <option selected value="0">Pilih Status</option>
                                        <option value="Tersedia">Tersedia</option>
                                        <option value="Tidak Tersedia">Tidak Tersedia</option>
                                    </select>
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
