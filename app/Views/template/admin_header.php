php
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