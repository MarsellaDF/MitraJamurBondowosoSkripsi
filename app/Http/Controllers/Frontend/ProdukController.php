<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Gallery;
use App\Models\Dashboard;

class ProdukController extends Controller
{
    public function index()
    {
        $this->param['produk'] = Produk::all();
        $this->param['gallery'] = Gallery::all();
        $this->param['dashboard'] = Dashboard::first();

        return view('frontend.pages.produk.index', $this->param);
    }

    public function detail($slug)
    {
        $this->param['produk'] = Produk::select('produk.id_produk', 'produk.nama', 'produk.harga', 'produk.gambar','produk.deskripsi', 'produk.kategori', 'produk.slug', 'produk.status')->where('produk.slug', $slug)->first();
        $this->param['oproduk'] = Produk::inRandomOrder()->limit(3)->get();
        $this->param['gallery'] = Gallery::all();
        $this->param['dashboard'] = Dashboard::first();

        return view('frontend.pages.produk.detail', $this->param);
    }
}
