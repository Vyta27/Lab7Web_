<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<article class="entry">
    <h2><?= $artikel['judul']; ?></h2>
    <p><small>Kategori: <b><?= $artikel['nama_kategori'] ?? 'Uncategorized'; ?></b></small></p>
    <img src="<?= base_url('/gambar/' . $artikel['gambar']); ?>" alt="<?= $artikel['judul']; ?>">
    <p><?= $artikel['isi']; ?></p>
</article>

<?= $this->endSection() ?>

