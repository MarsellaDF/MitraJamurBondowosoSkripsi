<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Gallery;
use App\Models\Dashboard;

class TentangController extends Controller
{
    public function index()
    {
        $this->param['produk'] = Produk::inRandomOrder()->limit(3)->get();
        $this->param['gallery'] = Gallery::all();
        $this->param['dashboard'] = Dashboard::first();

        return view('frontend.pages.tentang.index', $this->param);
    }
}
