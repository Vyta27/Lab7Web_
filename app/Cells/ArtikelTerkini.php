<?php

namespace App\Cells;

use App\Models\ArtikelModel;

// Hapus "extends Cell" dan "use CodeIgniter\View\Cell"
class ArtikelTerkini
{
    public function render(): string
    {
        $model   = new ArtikelModel();
        $artikel = $model->orderBy('created_at', 'DESC')->limit(5)->findAll();

        return view('components/artikel_terkini', ['artikel' => $artikel]);
    }
}