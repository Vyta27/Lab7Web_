<?= $this->include('template/admin_header'); ?>
<h2><?= $title; ?></h2>
<form action="" method="post" enctype="multipart/form-data">
    <p>
        <label for="judul">Judul</label>
        <input type="text" name="judul" value="<?= $artikel['judul']; ?>" id="judul" required>
    </p>
    <p>
        <label for="isi">Isi</label>
        <textarea name="isi" id="isi" cols="50" rows="10"><?= $artikel['isi']; ?></textarea>
    </p>
    <p>
        <label for="id_kategori">Kategori</label>
        <select name="id_kategori" id="id_kategori" required>
            <?php foreach ($kategori as $k): ?>
            <option value="<?= $k['id_kategori']; ?>"
                <?= ($artikel['id_kategori'] == $k['id_kategori']) ? 'selected' : ''; ?>>
                <?= $k['nama_kategori']; ?>
            </option>
            <?php endforeach; ?>
        </select>
    </p>
    <p>
        <label for="gambar">Gambar</label><br>
        <?php if (!empty($artikel['gambar'])): ?>
            <img src="<?= base_url('/gambar/' . $artikel['gambar']); ?>"
                 style="max-width:150px; margin-bottom:8px; display:block; border-radius:6px;">
            <small>Biarkan kosong jika tidak ingin mengganti gambar</small>
        <?php endif; ?>
        <input type="file" name="gambar" id="gambar" accept="image/*">
    </p>
    <p><input type="submit" value="Kirim" class="btn"></p>
</form>
<?= $this->include('template/admin_footer'); ?>