<?php
namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\KategoriModel;

class Artikel extends BaseController
{
    public function index()
    {
        $title   = 'Daftar Artikel';
        $model   = new ArtikelModel();
        $artikel = $model->getArtikelDenganKategori();
        return view('artikel/index', compact('artikel', 'title'));
    }

    public function view($slug)
    {
        $model           = new ArtikelModel();
        $data['artikel'] = $model->db->table('artikel')
            ->select('artikel.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left')
            ->where('artikel.slug', $slug)
            ->get()
            ->getRowArray();

        if (empty($data['artikel'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $data['title'] = $data['artikel']['judul'];
        return view('artikel/detail', $data);
    }

    public function admin_index()
    {
        $title       = 'Daftar Artikel';
        $model       = new ArtikelModel();
        $q           = $this->request->getVar('q') ?? '';
        $kategori_id = $this->request->getVar('kategori_id') ?? '';
        $page        = $this->request->getVar('page') ?? 1;

        // Sorting
        $sort        = $this->request->getVar('sort')  ?? 'artikel.id';
        $order       = $this->request->getVar('order') ?? 'asc';
        $allowedSort = ['artikel.id', 'artikel.judul', 'kategori.nama_kategori', 'artikel.status'];
        if (!in_array($sort, $allowedSort)) $sort = 'artikel.id';
        $order = ($order === 'desc') ? 'desc' : 'asc';

        $artikel = $model->select('artikel.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left');

        if ($q != '') {
            $artikel->like('artikel.judul', $q);
        }
        if ($kategori_id != '') {
            $artikel->where('artikel.id_kategori', $kategori_id);
        }

        $artikelData = $artikel->orderBy($sort, $order)->paginate(10, 'default', $page);
        $pager       = $model->pager;

        $pagerLinks = [];
        if ($pager) {
            $totalPages  = $pager->getPageCount();
            $currentPage = $pager->getCurrentPage();
            for ($i = 1; $i <= $totalPages; $i++) {
                $pagerLinks[] = [
                    'title'  => (string)$i,
                    'url'    => '/admin/artikel?page=' . $i,
                    'active' => ($i == $currentPage),
                ];
            }
        }

        $data = [
            'title'       => $title,
            'q'           => $q,
            'kategori_id' => $kategori_id,
            'artikel'     => $artikelData,
            'pager'       => $pager,
        ];

        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'artikel'     => $artikelData,
                'pager'       => ['links' => $pagerLinks],
                'q'           => $q,
                'kategori_id' => $kategori_id,
            ]);
        }

        $kategoriModel    = new KategoriModel();
        $data['kategori'] = $kategoriModel->findAll();

        return view('artikel/admin_index', $data);
    }

    public function add()
    {
        $validation = \Config\Services::validation();
        $validation->setRules(['judul' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $file = $this->request->getFile('gambar');
            if ($file->isValid() && !$file->hasMoved()) {
                $file->move(ROOTPATH . 'public/gambar');
                $nama_file = $file->getName();
            } else {
                $nama_file = null;
            }

            $model = new ArtikelModel();
            $model->insert([
                'judul'       => $this->request->getPost('judul'),
                'isi'         => $this->request->getPost('isi'),
                'slug'        => url_title($this->request->getPost('judul'), '-', true),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'gambar'      => $nama_file,
            ]);
            return redirect()->to('/admin/artikel');
        }

        $kategoriModel    = new KategoriModel();
        $data['kategori'] = $kategoriModel->findAll();
        $data['title']    = "Tambah Artikel";
        return view('artikel/form_add', $data);
    }

    public function edit($id)
    {
        $model            = new ArtikelModel();
        $kategoriModel    = new KategoriModel();
        $data['artikel']  = $model->find($id);
        $data['kategori'] = $kategoriModel->findAll();
        $data['title']    = 'Edit Artikel';

        if (!$data['artikel']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Artikel tidak ditemukan');
        }

        $validation = \Config\Services::validation();
        $validation->setRules(['judul' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $file       = $this->request->getFile('gambar');
            $namaGambar = $data['artikel']['gambar'];

            if ($file && $file->isValid() && !$file->hasMoved()) {
                $file->move(ROOTPATH . 'public/gambar');
                $namaGambar = $file->getName();
            }

            $model->update($id, [
                'judul'       => $this->request->getPost('judul'),
                'isi'         => $this->request->getPost('isi'),
                'slug'        => url_title($this->request->getPost('judul'), '-', true),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'gambar'      => $namaGambar,
            ]);

            return redirect()->to('/admin/artikel');
        }

        return view('artikel/form_edit', $data);
    }

    public function delete($id)
    {
        $model = new ArtikelModel();
        $model->delete($id);
        return redirect()->to('/admin/artikel');
    }
}