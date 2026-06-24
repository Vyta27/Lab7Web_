<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function about()
    {
        return view('about', [
            'title'   => 'Halaman About',
            'content' => 'Ini adalah halaman About'
        ]);
    }

    public function contact()
    {
        return view('about', [
            'title'   => 'Halaman Kontak',
            'content' => 'Ini adalah halaman Kontak'
        ]);
    }

    public function faqs()
    {
        return view('about', [
            'title'   => 'Halaman FAQ',
            'content' => 'Ini adalah halaman FAQ'
        ]);
    }
}