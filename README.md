## Nama   : Navyta Budi Yulia
## NIM    : 312410184
## Kelas  : I241B

# Praktikum 1 : Lab7Web

## Langkah 1 
- Membuka XAMPP
- Klik tombol Start pada Apache

## Langkah 2
- lik tombol Config pada Apache
- Pilih php.ini
- Pastikan ekstensi berikut aktif (tidak ada tanda ; di depan):
    
```
extension=intl
extension=mysqli
extension=pdo_mysql
extension=openssl
```
- simpan file
- restart apache

## Langkah 3
- Unduh Codeigniter dari website https://codeigniter.com/download 
- Extrak file zip Codeigniter ke direktori htdocs/lab11_ci.
- Ubah nama direktory framework-4.x.xx menjadi ci4.
-  Buka browser dengan alamat http://localhost/lab11_ci/ci4/public/
-  
  <img width="1920" height="1008" alt="Image" src="https://github.com/user-attachments/assets/9604f5f3-f8b7-4acc-9d71-ad2152bdff98" />
  
## Langkah 4
- Menyimpan Project CodeIgniter
- Pastikan project berada di:

```
C:\xampp\htdocs\lab11_ci\ci4
```

## Langkah 5
- Menjalankan Server CodeIgniter
- Buka Command Prompt di folder project: `cd C:\xampp\htdocs\lab11_ci\ci4`
- Lalu jalankan :

```
php spark serve
```

<img width="1920" height="1008" alt="Image" src="https://github.com/user-attachments/assets/4b5705a3-4449-4d01-8b20-9a0b27552854" />

## Langkah 6
- Buka browser: `http://localhost:8080`

## Langkah 7
- Konfigurasi Routing
- Buka file: `app/Config/Routes.php`
- Tambahkan :

```
$routes->get('/', 'Home::index');
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');
```

- buka CLI dan jalankan perintah berikut :
  
```
php spark routes
```

<img width="1920" height="1008" alt="Image" src="https://github.com/user-attachments/assets/2e5c7f23-2e97-4a33-8e9a-cb788fcfeba3" />

- Selanjutnya coba akses route yang telah dibuat dengan mengakses alamat url
http://localhost:8080/about

<img width="1920" height="1008" alt="Image" src="https://github.com/user-attachments/assets/d8e54cd3-6dea-4378-b18a-0edc092111b3" />

## Langkah 8
- Membuat Controller Page
- Buat file : `app/Controllers/Page.php`
- isi :

```
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
```
<img width="1920" height="1008" alt="Image" src="https://github.com/user-attachments/assets/f5453ca5-4314-487b-a7d8-eb8e3b269543" />

## Langkah 9 
- Mengubah Controller Home
- Buka : `app/Controllers/Home.php`
- Ubah menjadi :

```
<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('about', [
            'title'   => 'Halaman Home',
            'content' => 'Ini adalah halaman Home'
        ]);
    }
}
```

## Langkah 10
- Membuat View
- file : `app/Views/about.php`

```
<?= $this->include('template/header'); ?>

<section id="main">
    <h2><?= $title; ?></h2>
    <hr>
    <p><?= $content; ?></p>
</section>

<?= $this->include('template/footer'); ?>
```
<img width="1920" height="1008" alt="Image" src="https://github.com/user-attachments/assets/f98a3ec8-d9b8-41ce-b429-366c87bcd12f" />

## Langkah 11
- Membuat Layout Web dengan CSS
- File : `public/style.css`

```
/* import google font */
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:ital,wght@0,300;0,700;1,300&display=swap');

/* Reset CSS */
* {margin: 0; padding: 0;}
body {
line-height:1;
font-size:100%;
font-family:'Open Sans', sans-serif;
color:#5a5a5a;
}
#container {
width: 980px;
margin: 0 auto;
box-shadow: 0 0 1em #cccccc;
}
/* header */
header {padding: 20px;}
header h1 {
margin: 20px 10px;
color: #b5b5b5;
}

/* navigasi */
nav {
display: block;
background-color: #1f5faa;
}
nav a {
padding: 15px 30px;
display: inline-block;
color: #ffffff;
font-size: 14px;
text-decoration: none;
font-weight: bold;
}
nav a.active,
nav a:hover {
background-color: #2b83ea;
}

/* Hero Panel */
#hero {
    background-color: #e4e4e5;
    padding: 50px 20px;
    margin-bottom: 20px;
}

#hero h1 {
    margin-bottom: 20px;
    font-size: 35px;
}

#hero p {
    margin-bottom: 20px;
    font-size: 18px;
    line-height: 25px;
}

/* main content */
#wrapper {
margin: 0;
}

#main {
float: right;
width: 640px;
padding: 20px;
}
/* sidebar area */
#sidebar {
float: right;
width: 260px;
padding: 20px;
}

/* widget */
.widget-box {
border:1px solid #eee;
margin-bottom:20px;
}
.widget-box .title {
padding:10px 16px;
background-color:#428bca;
color:#fff;
}
.widget-box ul {
list-style-type:none;
}
.widget-box li {
border-bottom:1px solid #eee;
}
.widget-box li a {
padding:10px 16px;
color:#333;
display:block;
text-decoration:none;
}
.widget-box li:hover a {
background-color:#eee;
}
.widget-box p {
padding:15px;
line-height:25px;
}

/* footer */
footer {
    clear:both;
    background-color:#1d1d1d;
    padding:20px;
    color:#eee;
}

/* box */
.box {
display:block;
float:left;
width:33.333333%;
box-sizing:border-box;
-moz-box-sizing:border-box;
-webkit-box-sizing:border-box;
padding:0 10px;
text-align:center;
}
.box h3 {
margin: 15px 0;
}
.box p {
line-height: 20px;
font-size: 14px;
margin-bottom: 15px;
}
box img {
border: 0;
vertical-align: middle;
}
.image-circle {
border-radius: 50%;
}
.row {
margin: 0 -10px;
box-sizing: border-box;
-moz-box-sizing: border-box;
-webkit-box-sizing: border-box;
}
.row:after, .row:before,
.entry:after, .entry:before {
content:'';
display:table;
}
.row:after,
.entry:after {
clear:both;
}
.divider {
border:0;
border-top:1px solid #eeeeee;
margin:40px 0;
}
/* entry */
.entry {
margin: 15px 0;
}
.entry h2 {
margin-bottom: 20px;
}
.entry p {
line-height: 25px;
}
.entry img {
float: left;
border-radius: 5px;
margin-right: 15px;
}
.entry .right-img {
float: right;
}

/* Form Kontak */
.contact-form {
    max-width: 500px;
}

.form-group {
    margin-bottom: 15px;
}

input[type="text"],
input[type="email"],
textarea {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button.btn {
    background-color: #1f5faa;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
}

button.btn:hover {
    background-color: #2b83ea;
}
```

## Langkah 12
- Membuat Template Layout
- Buat folder : `app/Views/template`
- header.php
  

```
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('/style.css'); ?>">
</head>
<body>
<div id="container">
<header>
    <h1>Layout Sederhana</h1>
</header>
<nav>
    <a href="<?= base_url('/'); ?>">Home</a>
    <a href="<?= base_url('/about'); ?>">About</a>
    <a href="<?= base_url('/contact'); ?>">Kontak</a>
    <a href="<?= base_url('/faqs'); ?>">FAQ</a>
</nav>
<section id="wrapper">
```
 
- footer.php


```
</section>

<aside id="sidebar">
    <div class="widget-box">
        <h3 class="title">Widget Header</h3>
        <ul>
            <li><a href="#">Widget Link</a></li>
            <li><a href="#">Widget Link</a></li>
        </ul>
    </div>
</aside>

</section>

<footer>
    <p>&copy; 2026 - Universitas Pelita Bangsa</p>
</footer>

</div>
</body>
</html>
```

<img width="1920" height="1008" alt="Image" src="https://github.com/user-attachments/assets/6f6e3600-0c69-4cf6-aef0-dc350b5cc684" />

<img width="1920" height="1008" alt="Image" src="https://github.com/user-attachments/assets/7a6c4139-150e-454c-ad23-d11c49920b36" />

<img width="1920" height="1008" alt="Image" src="https://github.com/user-attachments/assets/66ca6300-bfc9-40cb-88ea-b4093d51d8a9" />

<img width="1920" height="1008" alt="Image" src="https://github.com/user-attachments/assets/fd03cc5e-0744-4f7c-891e-654737b9a1b6" />

# Praktikum 2 
## Langkah 13
- Membuat Database
```
CREATE DATABASE lab_ci4;
```
- Membuat Tabel
```
CREATE TABLE artikel (
id INT(11) auto_increment,
judul VARCHAR(200) NOT NULL,
isi TEXT,
gambar VARCHAR(200),
status TINYINT(1) DEFAULT 0,
slug VARCHAR(200),
PRIMARY KEY(id)
);
```

## Langkah 14
- Konfigurasi Routing
- `app/Config/Routes.php`

```
<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');

$routes->get('/artikel','Artikel::index');
$routes->get('/artikel/(:any)', 'Artikel::view/$1');

$routes->setAutoRoute(true);

$routes->group('admin', function($routes) {
    $routes->get('artikel', 'Artikel::admin_index');
    $routes->add('artikel/add', 'Artikel::add');
    $routes->add('artikel/edit/(:any)', 'Artikel::edit/$1');
    $routes->get('artikel/delete/(:any)', 'Artikel::delete/$1');
});
```

## Langkah 15
- Membuat Model Artikel
- `app/Models/ArtikelModel.php`

```
<?php

namespace App\Models;
use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'judul',
        'isi',
        'gambar',
        'status',
        'slug'
    ];
}}
```

## Langkah 16
- Membuat Controller Artikel
- `app/Controllers/Artikel.php`

```
<?php

namespace App\Controllers;

use App\Models\ArtikelModel;

class Artikel extends BaseController
{

    public function index()
    {
        $title = 'Daftar Artikel';
        $model = new ArtikelModel();
        $artikel = $model->findAll();

        return view('artikel/index', compact('artikel','title'));
    }

    public function view($slug)
    {
        $model = new ArtikelModel();
        $artikel = $model->where(['slug' => $slug])->first();

        if (!$artikel)
        {
            throw PageNotFoundException::forPageNotFound();
        }

        $title = $artikel['judul'];

        return view('artikel/detail', compact('artikel','title'));
    }

    public function admin_index()
    {
        $title = 'Daftar Artikel';
        $model = new ArtikelModel();
        $artikel = $model->findAll();

        return view('artikel/admin_index', compact('artikel','title'));
    }
}
```

## Langkah 17
- Membuat View Daftar Artikel
- `app/Views/artikel/index.php`

```
<?= $this->include('template/header'); ?>

<?php foreach ($artikel as $row): ?>

<article class="entry">

<h2>
<a href="<?= base_url('/artikel/' . $row['slug']);?>">
<?= $row['judul']; ?>
</a>
</h2>

<p><?= substr($row['isi'],0,200); ?></p>

</article>

<?php endforeach; ?>

<?= $this->include('template/footer'); ?>
```

- Selanjutnya buka browser kembali, dengan mengakses url http://localhost:8080/artikel 
  
<img width="1920" height="1008" alt="Image" src="https://github.com/user-attachments/assets/dc83cc10-25cc-4842-a834-53d0aac599a2" />

- Kemudian coba tambahkan beberapa data pada database agar
dapat ditampilkan datanya.

```
INSERT INTO artikel (judul, isi, slug) VALUE
('Artikel pertama', 'Lorem Ipsum adalah contoh teks atau dummy dalam
industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah
menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak
yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk
menjadi sebuah buku contoh huruf.', 'artikel-pertama'),
('Artikel kedua', 'Tidak seperti anggapan banyak orang, Lorem Ipsum
bukanlah teks-teks yang diacak. Ia berakar dari sebuah naskah sastra latin
klasik dari era 45 sebelum masehi, hingga bisa dipastikan usianya telah
mencapai lebih dari 2000 tahun.', 'artikel-kedua');
```

<img width="1920" height="1008" alt="Image" src="https://github.com/user-attachments/assets/02f9b6f7-18f9-4a7b-8f87-e93244d9702b" />

## Langkah 18
- Membuat Tampilan Detail Artikel
- Tambahkan fungsi baru pada Controller Artikel dengan nama view().

```
public function view($slug)
{
$model = new ArtikelModel();
$artikel = $model->where([
'slug' => $slug
])->first();
// Menampilkan error apabila data tidak ada.
if (!$artikel)
{
throw PageNotFoundException::forPageNotFound();
}
$title = $artikel['judul'];
return view('artikel/detail', compact('artikel', 'title'));
}
```

## Langkah 19
- Membuat View Detail
- Buat view baru untuk halaman detail dengan nama app/views/artikel/detail.php.

```
<?= $this->include('template/header'); ?>
<article class="entry">
<h2><?= $artikel['judul']; ?></h2>
<img src="<?= base_url('/gambar/' . $artikel['gambar']);?>" alt="<?=
$artikel['judul']; ?>">
<p><?= $row['isi']; ?></p>
</article>
<?= $this->include('template/footer'); ?>
```

## Langkah 20
- Buka Kembali file app/config/Routes.php, kemudian tambahkan routing untuk artikel detail.

```
$routes->get('/artikel/(:any)', 'Artikel::view/$1');
```

<img width="1920" height="1008" alt="Image" src="https://github.com/user-attachments/assets/fe37313f-7a8c-44fb-ac35-5dd20d242635" />

## Langkah 21
- Membuat Halaman Admin Artikel
- `app/Views/artikel/admin_index.php`

```
<?= $this->include('template/header'); ?>

<h2><?= $title; ?></h2>

<a href="<?= base_url('/admin/artikel/add'); ?>" class="btn">Tambah Artikel</a>

<table class="table">

<thead>
<tr>
<th>ID</th>
<th>Judul</th>
<th>Status</th>
<th>Aksi</th>
</tr>
</thead>

<tbody>

<?php if($artikel): foreach($artikel as $row): ?>

<tr>

<td><?= $row['id']; ?></td>

<td>
<b><?= $row['judul']; ?></b>
<p><small><?= substr($row['isi'],0,50); ?></small></p>
</td>

<td><?= $row['status']; ?></td>

<td>

<a href="<?= base_url('/admin/artikel/edit/'.$row['id']); ?>">Ubah</a>

<a onclick="return confirm('Yakin menghapus data?');"
href="<?= base_url('/admin/artikel/delete/'.$row['id']); ?>">
Hapus
</a>

</td>

</tr>

<?php endforeach; else: ?>

<tr>
<td colspan="4">Belum ada data.</td>
</tr>

<?php endif; ?>

</tbody>
</table>

<?= $this->include('template/footer'); ?>
```

- Akses menu admin dengan url http://localhost:8080/admin/artikel

<img width="1920" height="1008" alt="Image" src="https://github.com/user-attachments/assets/779af90c-0876-46cd-859f-ac871cb60336" />

## Langkah 22
- Membuat Form Tambah Artikel
- `app/Views/artikel/form_add.php`

```
<?= $this->include('template/header'); ?>

<h2><?= $title; ?></h2>

<form action="" method="post">

<p>
<input type="text" name="judul">
</p>

<p>
<textarea name="isi" cols="50" rows="10"></textarea>
</p>

<p>
<input type="submit" value="Kirim">
</p>

</form>

<?= $this->include('template/footer'); ?>
```

<img width="1920" height="1008" alt="Image" src="https://github.com/user-attachments/assets/8f801d18-1f1a-47ca-958a-30c84ef5363e" />

## Langkah 23
- Membuat Form Edit Artikel
- `app/Views/artikel/form_edit.php`

```
<?= $this->include('template/header'); ?>

<h2><?= $title; ?></h2>

<form action="" method="post">

<p>
<input type="text" name="judul" value="<?= $data['judul']; ?>">
</p>

<p>
<textarea name="isi" cols="50" rows="10">
<?= $data['isi']; ?>
</textarea>
</p>

<p>
<input type="submit" value="Kirim">
</p>

</form>

<?= $this->include('template/footer'); ?>
```
<img width="1920" height="1008" alt="Image" src="https://github.com/user-attachments/assets/99cbd4dd-7b31-4502-be93-81b4ab46cd9a" />

## Langkah 24
- Membuat Fungsi Hapus Artikel

```
public function delete($id)
{
    $artikel = new ArtikelModel();
    $artikel->delete($id);

    return redirect('admin/artikel');
}
```

# Praktikum 3
## Langkah 25
- Menambahkan Kolom `created_at` pada Tabel Artikel

```sql
ALTER TABLE artikel 
ADD COLUMN created_at DATETIME DEFAULT CURRENT_TIMESTAMP;

UPDATE artikel SET created_at = NOW() WHERE created_at IS NULL;
```

## Langkah 26
- Update ArtikelModel.php
- Tambahkan field `created_at` dan aktifkan timestamps pada file `app/Models/ArtikelModel.php`:

```php
<?php
namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table            = 'artikel';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['judul', 'isi', 'status', 'slug', 'gambar', 'created_at'];
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = '';
}
```

## Langkah 26
- Membuat Layout Utama
- Buat folder `layout` di dalam `app/Views/`, kemudian buat file `main.php`:

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'My Website' ?></title>
    <link rel="stylesheet" href="<?= base_url('/style.css'); ?>">
</head>
<body>
<div id="container">
    <header>
        <h1>Layout Sederhana</h1>
    </header>
    <nav>
        <a href="<?= base_url('/'); ?>">Home</a>
        <a href="<?= base_url('/artikel'); ?>">Artikel</a>
        <a href="<?= base_url('/about'); ?>">About</a>
        <a href="<?= base_url('/contact'); ?>">Kontak</a>
    </nav>
    <section id="wrapper">
        <section id="main">
            <?= $this->renderSection('content') ?>
        </section>
        <aside id="sidebar">
            <?= view_cell('App\\Cells\\ArtikelTerkini::render') ?>
            <div class="widget-box">
                <h3 class="title">Widget Header</h3>
                <ul>
                    <li><a href="#">Widget Link</a></li>
                    <li><a href="#">Widget Link</a></li>
                </ul>
            </div>
            <div class="widget-box">
                <h3 class="title">Widget Text</h3>
                <p>Vestibulum lorem elit, iaculis in nisl volutpat,
                malesuada tincidunt arcu. Proin in leo fringilla.</p>
            </div>
        </aside>
    </section>
    <footer>
        <p>&copy; 2021 - Universitas Pelita Bangsa</p>
    </footer>
</div>
</body>
</html>
```

## Langkah 27
- Membuat View Cell ArtikelTerkini
- Buat folder `Cells` di dalam `app/`, kemudian buat file `ArtikelTerkini.php`:

```php
<?php
namespace App\Cells;

use App\Models\ArtikelModel;

class ArtikelTerkini
{
    public function render(): string
    {
        $model   = new ArtikelModel();
        $artikel = $model->orderBy('created_at', 'DESC')->limit(5)->findAll();

        return view('components/artikel_terkini', ['artikel' => $artikel]);
    }
}
```

## Langkah 28
- Membuat View untuk View Cell
- Buat folder `components` di dalam `app/Views/`, kemudian buat file `artikel_terkini.php`:

```php
<div class="widget-box">
    <h3 class="title">Artikel Terkini</h3>
    <ul>
        <?php if (!empty($artikel)): ?>
            <?php foreach ($artikel as $row): ?>
                <li>
                    <a href="<?= base_url('/artikel/' . $row['slug']) ?>">
                        <?= esc($row['judul']) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>Belum ada artikel.</li>
        <?php endif; ?>
    </ul>
</div>
```

## Langkah 29
- Modifikasi View Home

```php
<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h1><?= $title; ?></h1>
<hr>
<p><?= $content; ?></p>

<?= $this->endSection() ?>
```

- Ubah juga `app/Controllers/Home.php`:

```php
<?php
namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'title'   => 'Halaman Utama',
            'content' => 'Selamat datang di website Portal Berita.',
        ];
        return view('home', $data);
    }
}
```

<img width="1920" height="1008" alt="Image" src="https://github.com/user-attachments/assets/02706568-a542-4cd6-9c26-6cd8fcc969d6" />

## Langkah 30
- Modifikasi View Artikel
- Ubah file `app/Views/artikel/index.php`:

```php
<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h2><?= $title; ?></h2>

<?php if ($artikel): foreach ($artikel as $row): ?>
<article class="entry">
    <h2>
        <a href="<?= base_url('/artikel/' . $row['slug']); ?>">
            <?= $row['judul']; ?>
        </a>
    </h2>
    <?php if ($row['gambar']): ?>
    <img src="<?= base_url('/gambar/' . $row['gambar']); ?>" alt="<?= $row['judul']; ?>">
    <?php endif; ?>
    <p><?= substr($row['isi'], 0, 200); ?>...</p>
</article>
<hr class="divider" />
<?php endforeach; else: ?>
<article class="entry">
    <h2>Belum ada data.</h2>
</article>
<?php endif; ?>

<?= $this->endSection() ?>
```

- Ubah juga file `app/Views/artikel/detail.php`:

```php
<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<article class="entry">
    <h2><?= $artikel['judul']; ?></h2>
    <?php if ($artikel['gambar']): ?>
    <img src="<?= base_url('/gambar/' . $artikel['gambar']); ?>" alt="<?= $artikel['judul']; ?>">
    <?php endif; ?>
    <p><?= $artikel['isi']; ?></p>
</article>

<?= $this->endSection() ?>
```


<img width="1920" height="1008" alt="Image" src="https://github.com/user-attachments/assets/b55df775-da99-45f0-b674-75b7efc21914" />

## Struktur folder akhir

 ```
app/
├── Cells/
│   └── ArtikelTerkini.php
├── Controllers/
│   ├── Artikel.php
│   └── Home.php
├── Models/
│   └── ArtikelModel.php
└── Views/
    ├── layout/
    │   └── main.php
    ├── components/
    │   └── artikel_terkini.php
    ├── artikel/
    │   ├── index.php
    │   ├── detail.php
    │   ├── form_add.php
    │   ├── form_edit.php
    │   └── admin_index.php
    └── home.php
```

# Praktikum 4

## Langkah 31
- Membuat Tabel User di Database
- Buka phpMyAdmin, pilih database `lab_ci4`, jalankan query berikut:

```sql
CREATE TABLE user (
    id INT(11) auto_increment,
    username VARCHAR(200) NOT NULL,
    useremail VARCHAR(200),
    userpassword VARCHAR(200),
    PRIMARY KEY(id)
);
```

<img width="1920" height="1008" alt="Image" src="https://github.com/user-attachments/assets/0cb99f1e-e5e7-4b3e-9a1f-92803639ea72" />

## Langkah 32
- Membuat Model User
- Buat file baru `app/Models/UserModel.php`:

```php
<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['username', 'useremail', 'userpassword'];
}
```

## Langkah 33
- Membuat Controller User
- Buat file baru `app/Controllers/User.php` dengan method `index()`, `login()`, dan `logout()`:

```php
<?php
namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        $title = 'Daftar User';
        $model = new UserModel();
        $users = $model->findAll();
        return view('user/index', compact('users', 'title'));
    }

    public function login()
    {
        helper(['form']);
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        if (!$email) {
            return view('user/login');
        }

        $session = session();
        $model   = new UserModel();
        $login   = $model->where('useremail', $email)->first();

        if ($login) {
            $pass = $login['userpassword'];
            if (password_verify($password, $pass)) {
                $login_data = [
                    'user_id'    => $login['id'],
                    'user_name'  => $login['username'],
                    'user_email' => $login['useremail'],
                    'logged_in'  => TRUE,
                ];
                $session->set($login_data);
                return redirect('admin/artikel');
            } else {
                $session->setFlashdata("flash_msg", "Password salah.");
                return redirect()->to('/user/login');
            }
        } else {
            $session->setFlashdata("flash_msg", "Email tidak terdaftar.");
            return redirect()->to('/user/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/user/login');
    }
}
```

## Langkah 34

- Membuat View Login
- Buat folder `user` di `app/Views/`, kemudian buat file `login.php`:

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('/style.css'); ?>">
</head>
<body>
<div id="login-wrapper">
    <h1>Sign In</h1>

    <?php if (session()->getFlashdata('flash_msg')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('flash_msg') ?>
    </div>
    <?php endif; ?>

    <form action="" method="post">
        <div class="mb-3">
            <label for="InputForEmail">Email address</label>
            <input type="email" name="email" class="form-control"
                   id="InputForEmail" value="<?= set_value('email') ?>">
        </div>
        <div class="mb-3">
            <label for="InputForPassword">Password</label>
            <input type="password" name="password"
                   class="form-control" id="InputForPassword">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
</body>
</html>
```

## Langkah 35
- Menambahkan CSS untuk Halaman Login
- Tambahkan kode berikut di bagian paling bawah `public/style.css`:

```css
/* Login Page */
#login-wrapper {
    max-width: 400px;
    margin: 80px auto;
    padding: 30px;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

#login-wrapper h1 {
    margin-bottom: 20px;
    color: #1f5faa;
}

#login-wrapper .mb-3 {
    margin-bottom: 15px;
}

#login-wrapper label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    font-size: 14px;
}

#login-wrapper input[type="email"],
#login-wrapper input[type="password"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.alert {
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 4px;
}

.alert-danger {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

.btn-primary {
    background-color: #1f5faa;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
    font-size: 15px;
}

.btn-primary:hover {
    background-color: #2b83ea;
}
```

<img width="1920" height="1008" alt="Image" src="https://github.com/user-attachments/assets/a2b08b8b-968e-4b08-97a2-30b843d74503" />

## Langkah 36
- Membuat Database Seeder
- Buka terminal/CMD di folder project, jalankan perintah:

```bash
php spark make:seeder UserSeeder
```

-  Buka file `app/Database/Seeds/UserSeeder.php`, isi dengan kode berikut:

```php
<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $model = model('UserModel');
        $model->insert([
            'username'     => 'admin',
            'useremail'    => 'admin@email.com',
            'userpassword' => password_hash('admin123', PASSWORD_DEFAULT),
        ]);
    }
}
```
  
- Jalankan seeder dengan perintah:

```bash
php spark db:seed UserSeeder
```

<img width="1920" height="1008" alt="Image" src="https://github.com/user-attachments/assets/06826d4d-df28-44a5-a8c0-7969f83ef48e" />

## Langkah 37
- Membuat Auth Filter
- Buat folder `Filters` di `app/`, kemudian buat file `Auth.php`:


```php
<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Jika user belum login, redirect ke halaman login
        if (!session()->get('logged_in')) {
            return redirect()->to('/user/login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
```

## Langkah 38
- Mendaftarkan Filter di Config
- Buka `app/Config/Filters.php`, tambahkan `auth` di bagian `$aliases`:

```php
public array $aliases = [
    'csrf'          => CSRF::class,
    'toolbar'       => DebugToolbar::class,
    'honeypot'      => Honeypot::class,
    'invalidchars'  => InvalidChars::class,
    'secureheaders' => SecureHeaders::class,
    'cors'          => Cors::class,
    'forcehttps'    => ForceHTTPS::class,
    'pagecache'     => PageCache::class,
    'performance'   => PerformanceMetrics::class,
    'auth'          => \App\Filters\Auth::class,  // ← tambahkan baris ini
];
```

## Langkah 39 
- Update Routes
- Buka `app/Config/Routes.php`, tambahkan route login/logout dan filter auth pada group admin:

```php
<?php

use CodeIgniter\Router\RouteCollection;

$routes->get('/', 'Home::index');
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');
$routes->get('/artikel', 'Artikel::index');
$routes->get('/artikel/(:any)', 'Artikel::view/$1');

// Route Login & Logout
$routes->get('/user/login', 'User::login');
$routes->post('/user/login', 'User::login');
$routes->get('/user/logout', 'User::logout');

$routes->setAutoRoute(true);

// Route Admin - dilindungi filter auth
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('artikel', 'Artikel::admin_index');
    $routes->add('artikel/add', 'Artikel::add');
    $routes->add('artikel/edit/(:any)', 'Artikel::edit/$1');
    $routes->get('artikel/delete/(:any)', 'Artikel::delete/$1');
});
```

## Langkah 40
- Menambahkan Tombol Logout di Admin Header
- Buka `app/Views/template/admin_header.php`, tambahkan link logout di navbar:


```php
<!DOCTYPE html>
<html>
<head>
<title><?= $title; ?></title>
<link rel="stylesheet" href="<?= base_url('/style.css'); ?>">
</head>
<body>
<div id="container">
<header>
    <h1>Admin Portal Berita</h1>
</header>
<nav>
    <a href="<?= base_url('/admin/artikel'); ?>">Dashboard</a>
    <a href="<?= base_url('/admin/artikel'); ?>">Artikel</a>
    <a href="<?= base_url('/admin/artikel/add'); ?>">Tambah Artikel</a>
    <a href="<?= base_url('/user/logout') ?>" 
       style="float:right; background-color:#d9534f;">Logout</a>
</nav>
<section id="wrapper">
<section id="main">
```

# Praktikum 5 - Pagination dan Pencarian

## Langkah 41 — Membuat Pagination

Pagination digunakan untuk membatasi jumlah data yang ditampilkan per halaman. CodeIgniter 4 sudah menyediakan library pagination bawaan sehingga mudah digunakan.

Buka file `app/Controllers/Artikel.php`, lalu modifikasi method `admin_index()` seperti berikut:

```php
public function admin_index() 
{
    $title = 'Daftar Artikel';
    $model = new ArtikelModel();
    $data = [
        'title'   => $title,
        'artikel' => $model->paginate(10), // data dibatasi 10 record per halaman
        'pager'   => $model->pager,
    ];
    return view('artikel/admin_index', $data);
}
```

Kemudian buka file `app/Views/artikel/admin_index.php` dan tambahkan kode pagination di bawah tabel:

```php
<?= $pager->links(); ?>
```

## Langkah 42 — Membuat Pencarian

Pencarian data digunakan untuk memfilter artikel berdasarkan kata kunci yang dimasukkan pengguna.

Kembali buka `app/Controllers/Artikel.php`, ubah method `admin_index()` menjadi:

```php
public function admin_index() 
{
    $title = 'Daftar Artikel';
    $q     = $this->request->getVar('q') ?? '';
    $model = new ArtikelModel();
    $data  = [
        'title'   => $title,
        'q'       => $q,
        'artikel' => $model->like('judul', $q)->paginate(10), // data dibatasi 10 record per halaman
        'pager'   => $model->pager,
    ];
    return view('artikel/admin_index', $data);
}
```

**Penjelasan perubahan:**
- `$q = $this->request->getVar('q') ?? ''` — mengambil nilai parameter `q` dari URL (hasil input form pencarian). Jika tidak ada, nilai default adalah string kosong.
- `$model->like('judul', $q)` — memfilter data artikel yang judulnya mengandung kata kunci `$q`.
- `->paginate(10)` — membatasi hasil query menjadi 10 data per halaman.
- `$model->pager` — mengambil objek pager untuk menampilkan link navigasi halaman.

---

## Langkah 43 — Menambahkan Form Pencarian di View

Buka file `app/Views/artikel/admin_index.php`, tambahkan form pencarian **sebelum** deklarasi tabel, dan ubah link pager agar mempertahankan kata kunci saat berpindah halaman:

```php
<?= $this->include('template/admin_header'); ?>

<!-- Form Pencarian -->
<form method="get" class="form-search">
    <input type="text" name="q" value="<?= $q; ?>" placeholder="Cari data">
    <input type="submit" value="Cari" class="btn btn-primary">
</form>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Status</th>
            <th>AKsi</th>
        </tr>
    </thead>
    <tbody>
        <?php if($artikel): foreach($artikel as $row): ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td>
                <b><?= $row['judul']; ?></b>
                <p><small><?= substr($row['isi'], 0, 50); ?></small></p>
            </td>
            <td><?= $row['status']; ?></td>
            <td>
                <a class="btn" href="<?= base_url('/admin/artikel/edit/' . $row['id']);?>">Ubah</a>
                <a class="btn btn-danger" onclick="return confirm('Yakin menghapus data?');"
                   href="<?= base_url('/admin/artikel/delete/' . $row['id']);?>">Hapus</a>
            </td>
        </tr>
        <?php endforeach; else: ?>
        <tr>
            <td colspan="4">Belum ada data.</td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>

<!-- Pagination dengan query pencarian -->
<?= $pager->only(['q'])->links(); ?>

<?= $this->include('template/admin_footer'); ?>
```

## Langkah 44 — Menambahkan Data untuk Uji Pagination

Agar pagination terlihat, diperlukan lebih dari 10 data. Tambahkan data melalui phpMyAdmin:

```sql
INSERT INTO artikel (judul, isi, slug, created_at) VALUES
('Artikel ketiga', 'Isi artikel ketiga', 'artikel-ketiga', NOW()),
('Artikel keempat', 'Isi artikel keempat', 'artikel-keempat', NOW()),
('Artikel kelima', 'Isi artikel kelima', 'artikel-kelima', NOW()),
('Artikel keenam', 'Isi artikel keenam', 'artikel-keenam', NOW()),
('Artikel ketujuh', 'Isi artikel ketujuh', 'artikel-ketujuh', NOW()),
('Artikel kedelapan', 'Isi artikel kedelapan', 'artikel-kedelapan', NOW()),
('Artikel kesembilan', 'Isi artikel kesembilan', 'artikel-kesembilan', NOW()),
('Artikel kesepuluh', 'Isi artikel kesepuluh', 'artikel-kesepuluh', NOW()),
('Artikel kesebelas', 'Isi artikel kesebelas', 'artikel-kesebelas', NOW()),
('Artikel keduabelas', 'Isi artikel keduabelas', 'artikel-keduabelas', NOW());
```
<img width="1920" height="1008" alt="Image" src="https://github.com/user-attachments/assets/ad4dcf86-386f-4c2c-95ba-81123b7581b4" />

## Langkah 45 — Hasil Akhir

<img width="1920" height="1008" alt="Image" src="https://github.com/user-attachments/assets/243ccf6c-9440-4044-805a-c721672ab78d" />

<img width="1920" height="1008" alt="Image" src="https://github.com/user-attachments/assets/f1e9aa37-2961-4f2c-a0f5-cb4de502834f" />


# Praktikum 6 - Relasi Tabel dan Query Builder

## Langkah 46 — Membuat Tabel Kategori

Buka phpMyAdmin dan jalankan query berikut untuk membuat tabel `kategori`:

```sql
CREATE TABLE kategori (
    id_kategori INT(11) AUTO_INCREMENT,
    nama_kategori VARCHAR(100) NOT NULL,
    slug_kategori VARCHAR(100),
    PRIMARY KEY (id_kategori)
);
```

Tambahkan kolom `id_kategori` ke tabel `artikel` sebagai foreign key:

```sql
ALTER TABLE artikel
ADD COLUMN id_kategori INT(11),
ADD CONSTRAINT fk_kategori_artikel
FOREIGN KEY (id_kategori) REFERENCES kategori(id_kategori);
```

Isi tabel kategori dengan data awal:

```sql
INSERT INTO kategori (nama_kategori, slug_kategori) VALUES
('Teknologi', 'teknologi'),
('Pendidikan', 'pendidikan'),
('Kesehatan', 'kesehatan'),
('Hiburan', 'hiburan');
```

> **Screenshot:** Tabel kategori di phpMyAdmin

![Tabel Kategori](screenshots/tabel_kategori.png)

---

## Langkah 47 — Membuat Model Kategori

Buat file baru `app/Models/KategoriModel.php`:

```php
<?php
namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table         = 'kategori';
    protected $primaryKey    = 'id_kategori';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama_kategori', 'slug_kategori'];
}
```

---

## Langkah 48 — Modifikasi ArtikelModel

Buka `app/Models/ArtikelModel.php` dan tambahkan method `getArtikelDenganKategori()` serta tambahkan `id_kategori` ke `$allowedFields`:

```php
<?php
namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table            = 'artikel';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['judul', 'isi', 'status', 'slug', 'gambar', 'id_kategori'];
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = '';

    public function getArtikelDenganKategori()
    {
        return $this->db->table('artikel')
            ->select('artikel.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left')
            ->get()
            ->getResultArray();
    }
}
```

---

## Langkah 49 — Modifikasi Controller Artikel

Buka `app/Controllers/Artikel.php` dan modifikasi untuk menggunakan `KategoriModel` serta menambahkan fitur filter kategori:

```php
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

    public function admin_index()
    {
        $title       = 'Daftar Artikel';
        $model       = new ArtikelModel();
        $q           = $this->request->getVar('q') ?? '';
        $kategori_id = $this->request->getVar('kategori_id') ?? '';

        $builder = $model->db->table('artikel')
            ->select('artikel.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left');

        if ($q != '') {
            $builder->like('artikel.judul', $q);
        }
        if ($kategori_id != '') {
            $builder->where('artikel.id_kategori', $kategori_id);
        }

        $data['artikel']     = $builder->get()->getResultArray();
        $data['title']       = $title;
        $data['q']           = $q;
        $data['kategori_id'] = $kategori_id;
        $data['pager']       = null;

        $kategoriModel    = new KategoriModel();
        $data['kategori'] = $kategoriModel->findAll();

        return view('artikel/admin_index', $data);
    }

    public function add()
    {
        $kategoriModel    = new KategoriModel();
        $data['kategori'] = $kategoriModel->findAll();
        $data['title']    = 'Tambah Artikel';

        if ($this->request->getMethod() == 'post') {
            $model = new ArtikelModel();
            $model->insert([
                'judul'       => $this->request->getPost('judul'),
                'isi'         => $this->request->getPost('isi'),
                'slug'        => url_title($this->request->getPost('judul'), '-', true),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'status'      => 0,
            ]);
            return redirect()->to('/admin/artikel');
        }

        return view('artikel/form_add', $data);
    }

    public function edit($id)
    {
        $model            = new ArtikelModel();
        $kategoriModel    = new KategoriModel();
        $data['artikel']  = $model->find($id);
        $data['kategori'] = $kategoriModel->findAll();
        $data['title']    = 'Edit Artikel';

        if ($this->request->getMethod() == 'post') {
            $model->update($id, [
                'judul'       => $this->request->getPost('judul'),
                'isi'         => $this->request->getPost('isi'),
                'slug'        => url_title($this->request->getPost('judul'), '-', true),
                'id_kategori' => $this->request->getPost('id_kategori'),
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
```

## Langkah 50 — Modifikasi View

#### `app/Views/artikel/index.php`
Tambahkan tampilan nama kategori pada halaman publik:

```php
<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h2><?= $title; ?></h2>

<?php if ($artikel): foreach ($artikel as $row): ?>
<article class="entry">
    <h2>
        <a href="<?= base_url('/artikel/' . $row['slug']); ?>">
            <?= $row['judul']; ?>
        </a>
    </h2>
    <p><small>Kategori: <b><?= $row['nama_kategori'] ?? 'Uncategorized'; ?></b></small></p>
    <?php if ($row['gambar']): ?>
    <img src="<?= base_url('/gambar/' . $row['gambar']); ?>" alt="<?= $row['judul']; ?>">
    <?php endif; ?>
    <p><?= substr($row['isi'], 0, 200); ?>...</p>
</article>
<hr class="divider" />
<?php endforeach; else: ?>
<article class="entry">
    <h2>Belum ada data.</h2>
</article>
<?php endif; ?>

<?= $this->endSection() ?>
```

#### `app/Views/artikel/admin_index.php`
Tambahkan dropdown filter kategori:

```php
<?= $this->include('template/admin_header'); ?>

<form method="get" class="form-search">
    <input type="text" name="q" value="<?= $q; ?>" placeholder="Cari judul artikel">
    <select name="kategori_id">
        <option value="">Semua Kategori</option>
        <?php foreach ($kategori as $k): ?>
        <option value="<?= $k['id_kategori']; ?>"
            <?= ($kategori_id == $k['id_kategori']) ? 'selected' : ''; ?>>
            <?= $k['nama_kategori']; ?>
        </option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Cari" class="btn btn-primary">
</form>

<table class="table">
<thead>
<tr>
    <th>ID</th><th>Judul</th><th>Kategori</th><th>Status</th><th>Aksi</th>
</tr>
</thead>
<tbody>
<?php if (count($artikel) > 0): foreach ($artikel as $row): ?>
<tr>
    <td><?= $row['id']; ?></td>
    <td>
        <b><?= $row['judul']; ?></b>
        <p><small><?= substr($row['isi'], 0, 50); ?></small></p>
    </td>
    <td><?= $row['nama_kategori'] ?? '-'; ?></td>
    <td><?= $row['status']; ?></td>
    <td>
        <a class="btn" href="<?= base_url('/admin/artikel/edit/' . $row['id']); ?>">Ubah</a>
        <a class="btn btn-danger" onclick="return confirm('Yakin menghapus data?');"
           href="<?= base_url('/admin/artikel/delete/' . $row['id']); ?>">Hapus</a>
    </td>
</tr>
<?php endforeach; else: ?>
<tr><td colspan="5">Tidak ada data.</td></tr>
<?php endif; ?>
</tbody>
</table>

<?= $this->include('template/admin_footer'); ?>
```

#### `app/Views/artikel/form_add.php`
Tambahkan dropdown pilih kategori:

```php
<?= $this->include('template/admin_header'); ?>
<h2><?= $title; ?></h2>
<form action="" method="post">
    <p>
        <label for="judul">Judul</label>
        <input type="text" name="judul" id="judul" required>
    </p>
    <p>
        <label for="isi">Isi Artikel</label>
        <textarea name="isi" id="isi" cols="50" rows="10"></textarea>
    </p>
    <p>
        <label for="id_kategori">Kategori</label>
        <select name="id_kategori" id="id_kategori" required>
            <option value="">-- Pilih Kategori --</option>
            <?php foreach ($kategori as $k): ?>
            <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
            <?php endforeach; ?>
        </select>
    </p>
    <p><input type="submit" value="Simpan" class="btn"></p>
</form>
<?= $this->include('template/admin_footer'); ?>
```

#### `app/Views/artikel/form_edit.php`
Tambahkan dropdown kategori dengan nilai yang sudah dipilih sebelumnya:

```php
<?= $this->include('template/admin_header'); ?>
<h2><?= $title; ?></h2>
<form action="" method="post">
    <p>
        <label for="judul">Judul</label>
        <input type="text" name="judul" id="judul"
               value="<?= $artikel['judul']; ?>" required>
    </p>
    <p>
        <label for="isi">Isi Artikel</label>
        <textarea name="isi" id="isi" cols="50" rows="10"><?= $artikel['isi']; ?></textarea>
    </p>
    <p>
        <label for="id_kategori">Kategori</label>
        <select name="id_kategori" id="id_kategori" required>
            <option value="">-- Pilih Kategori --</option>
            <?php foreach ($kategori as $k): ?>
            <option value="<?= $k['id_kategori']; ?>"
                <?= ($artikel['id_kategori'] == $k['id_kategori']) ? 'selected' : ''; ?>>
                <?= $k['nama_kategori']; ?>
            </option>
            <?php endforeach; ?>
        </select>
    </p>
    <p><input type="submit" value="Simpan" class="btn"></p>
</form>
<?= $this->include('template/admin_footer'); ?>
```


## Langkah 51 — Tambah CSS Dropdown Kategori

Tambahkan di bagian bawah `public/style.css`:

```css
/* Dropdown Kategori di Form Pencarian */
.form-search select {
    width: auto;
    min-width: 150px;
    padding: 9px 12px;
    border: 1.5px solid var(--pink-100);
    border-radius: var(--radius-sm);
    font-size: 13.5px;
    color: #3d2535;
    background: white;
    cursor: pointer;
}

/* Dropdown Kategori di Form Tambah/Edit */
form select {
    width: 100%;
    padding: 10px 14px;
    border: 1.5px solid var(--pink-100);
    border-radius: var(--radius-sm);
    font-size: 14px;
    color: #3d2535;
    background: white;
    margin-bottom: 12px;
}
```

## Hasil Praktikum

### Halaman Admin — Daftar Artikel dengan Filter Kategori
<img width="1920" height="1008" alt="Image" src="https://github.com/user-attachments/assets/fe45f235-bcad-42fb-adc9-36d686e6ee91" />

### Form Tambah Artikel dengan Dropdown Kategori
<img width="1920" height="1008" alt="Image" src="https://github.com/user-attachments/assets/beec2351-99e8-4dfb-ab05-eb3e72ff20c8" />

### Form Edit Artikel dengan Kategori Terpilih
<img width="1920" height="1008" alt="Image" src="https://github.com/user-attachments/assets/25899dba-208d-4f4e-885d-f4054ac669a7" />

### Filter berdasarkan Kategori
<img width="1920" height="1008" alt="Image" src="https://github.com/user-attachments/assets/00de9789-8f89-4e5c-bab9-2d575658a2e7" />

<img width="1920" height="1008" alt="Image" src="https://github.com/user-attachments/assets/01308630-a020-4ab9-b12c-cba58d40c56a" />

<img width="1920" height="1008" alt="Image" src="https://github.com/user-attachments/assets/e673f899-7d56-4877-92b1-3027f68ec05a" />

<img width="1920" height="1008" alt="Image" src="https://github.com/user-attachments/assets/1a5eb8ec-4791-4bfb-be3d-685325594217" />





