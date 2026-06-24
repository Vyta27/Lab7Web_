<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('/style.css'); ?>">
</head>
<body>
<div id="container">

<?php $segment = service('uri')->getSegment(1); ?>

<header>
<?php if ($segment == 'admin'): ?>
    <h1>Admin Portal Berita</h1>
<?php else: ?>
    <h1>Portal Berita</h1>
<?php endif; ?>
</header>

<nav>
    <a href="<?= base_url('/'); ?>">Home</a>
    <a href="<?= base_url('/about'); ?>">About</a>
    <a href="<?= base_url('/artikel'); ?>">Artikel</a>
    <a href="<?= base_url('/contact'); ?>">Kontak</a>
    <a href="<?= base_url('/faqs'); ?>">FAQ</a>
</nav>

<section id="wrapper">
<section id="main"></section>