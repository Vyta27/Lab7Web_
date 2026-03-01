## Nama   : Navyta Budi Yulia
## NIM    : 312410184
## Kelas  : i241B

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
  <img width="1920" height="1008" alt="Image" src="https://github.com/user-attachments/assets/a769ad6a-7798-4b32-a654-7ba3a9bce8ca" />
  
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
- Output akan muncul :

```
CodeIgniter development server started on http://localhost:8080
```
(gambar)

## Langkah 6
- Buka browser: `http://localhost:8080`
(gambar)

## Langkah 7
- Konfigurasi Routing
- Buka file: `app/Config/Routes.php`
- Tambahkan :

```
$routes->get('/', 'Home::index');
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');
$routes->setAutoRoute(true);
```
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
(gambar)

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




