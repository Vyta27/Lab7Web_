<?= $this->include('template/admin_header'); ?>
<h2><?= $title; ?></h2>
<form action="" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <p>
        <label for="judul">Judul</label>
        <input type="text" name="judul" id="judul" required>
    </p>
    <p>
        <label for="isi">Isi</label>
        <textarea name="isi" id="isi" cols="50" rows="10"></textarea>
    </p>
    <p>
        <label for="id_kategori">Kategori</label>
        <select name="id_kategori" id="id_kategori" required>
            <?php foreach ($kategori as $k): ?>
            <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
            <?php endforeach; ?>
        </select>
    </p>
    <p>
        <label for="gambar">Gambar</label>
        <input type="file" name="gambar" id="gambar" accept="image/*">
    </p>
    <p><input type="submit" value="Kirim" class="btn"></p>
    <?php if (isset($error)): ?>
        <p style="color:red"><?= $error; ?></p>
    <?php endif; ?>
</form>
<?= $this->include('template/admin_footer'); ?>