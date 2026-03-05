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

## Langkah 14
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

## Langkah 15
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

## Langkah 16
- Buka Kembali file app/config/Routes.php, kemudian tambahkan routing untuk artikel detail.

```
$routes->get('/artikel/(:any)', 'Artikel::view/$1');
```


## Langkah 14
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

## Langkah 15
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

## Langkah 16
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

## Langkah 17
- Membuat Fungsi Hapus Artikel

```
public function delete($id)
{
    $artikel = new ArtikelModel();
    $artikel->delete($id);

    return redirect('admin/artikel');
}
```
