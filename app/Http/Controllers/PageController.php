<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        return 'Selamat Datang';
    }

    public function about() {
        return 'NIM : 2141762136 <br> Nama : Galur Arasy L.';
    }

    public function articles($articleId) {
        return "Halaman Artikel dengan id $articleId";
    }

}
