<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $visitor = \DB::table('visitor')->count();
        $gallery = \DB::table('gallery')->count();
        $produk = \DB::table('produk')->count();
        $feedback = \DB::table('feedback')->count();

        return view('welcome', compact('visitor', 'gallery', 'produk', 'feedback'));
    }
}
