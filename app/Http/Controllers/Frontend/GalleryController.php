<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Gallery;
use App\Models\Dashboard;

class GalleryController extends Controller
{
    public function index()
    {
        $this->param['produk'] = Produk::all();
        $this->param['gallery'] = Gallery::all();
        $this->param['dashboard'] = Dashboard::first();

        return view('frontend.pages.gallery.index', $this->param);
    }
}
