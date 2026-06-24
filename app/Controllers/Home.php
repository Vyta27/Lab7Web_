<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'title'   => 'Halaman Utama',
            'content' => 'Selamat datang di website Portal Berita. 
                          Website ini dibuat menggunakan Framework CodeIgniter 4.',
        ];

        return view('home', $data);
    }
}