<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ArtikelModel;

class AjaxController extends Controller
{
    public function index()
    {
    $data['title'] = 'Data Artikel (AJAX)';
    return view('ajax/index', $data);
    }

    public function getData()
    {
        $model = new ArtikelModel();
        $data  = $model->findAll();
        return $this->response->setJSON($data);
    }

    public function delete($id)
    {
        $model = new ArtikelModel();
        $model->delete($id);
        $data = ['status' => 'OK'];
        return $this->response->setJSON($data);
    }

    public function add()
    {
        $model = new ArtikelModel();
        $model->insert([
            'judul'       => $this->request->getPost('judul'),
            'isi'         => $this->request->getPost('isi'),
            'slug'        => url_title($this->request->getPost('judul'), '-', true),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'status'      => 0,
        ]);
        return $this->response->setJSON(['status' => 'OK']);
    }

    public function update($id)
    {
        $model = new ArtikelModel();
        $model->update($id, [
            'judul'       => $this->request->getPost('judul'),
            'isi'         => $this->request->getPost('isi'),
            'slug'        => url_title($this->request->getPost('judul'), '-', true),
            'id_kategori' => $this->request->getPost('id_kategori'),
        ]);
        return $this->response->setJSON(['status' => 'OK']);
    }

    public function getById($id)
    {
        $model = new ArtikelModel();
        $data  = $model->find($id);
        return $this->response->setJSON($data);
    }
}