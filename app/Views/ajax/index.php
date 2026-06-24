<?= $this->include('template/header'); ?>

<h1>Data Artikel (AJAX)</h1>

<button class="btn" id="btnTambah" style="margin-bottom:15px;">+ Tambah Artikel</button>

<div id="formContainer" style="display:none; background:#fff0f6; padding:20px; border-radius:8px; margin-bottom:20px; border:1px solid #ffadd2;">
    <h3 id="formTitle">Tambah Artikel</h3>
    <input type="hidden" id="artikelId">
    <p><label>Judul</label><input type="text" id="inputJudul" placeholder="Judul artikel" style="width:100%;"></p>
    <p><label>Isi</label><textarea id="inputIsi" rows="5" style="width:100%;"></textarea></p>
    <p>
    <label>Kategori</label>
    <select id="inputKategori" style="width:100%; padding:8px; border:1px solid #ffadd2; border-radius:4px;">
        <option value="">-- Pilih Kategori --</option>
        <?php
        $kategoriModel = new \App\Models\KategoriModel();
        foreach ($kategoriModel->findAll() as $k):
        ?>
        <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
        <?php endforeach; ?>
    </select>
</p>
    <button class="btn" id="btnSimpan">Simpan</button>
    <button class="btn btn-danger" id="btnBatal" style="margin-left:8px;">Batal</button>
</div>

<table class="table" id="artikelTable" style="width:100%;">
    <thead>
        <tr>
            <th>ID</th><th>Judul</th><th>Status</th><th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <tr><td colspan="4">Loading data...</td></tr>
    </tbody>
</table>

<script src="<?= base_url('assets/js/jquery-3.6.0.min.js') ?>"></script>
<script>
$(document).ready(function () {
    function loadData() {
        $('#artikelTable tbody').html('<tr><td colspan="4">Loading data...</td></tr>');
        $.ajax({
            url: "<?= base_url('ajax/getData') ?>",
            method: "GET", dataType: "json",
            success: function (data) {
                var tableBody = "";
                if (data.length === 0) {
                    tableBody = '<tr><td colspan="4">Belum ada data.</td></tr>';
                } else {
                    for (var i = 0; i < data.length; i++) {
                        var row = data[i];
                        tableBody += '<tr>';
                        tableBody += '<td>' + row.id + '</td>';
                        tableBody += '<td><b>' + row.judul + '</b></td>';
                        tableBody += '<td>' + (row.status == 1 ? 'Aktif' : 'Draft') + '</td>';
                        tableBody += '<td><a href="#" class="btn btn-edit" data-id="' + row.id + '">Ubah</a> ';
                        tableBody += '<a href="#" class="btn btn-danger btn-delete" data-id="' + row.id + '">Hapus</a></td>';
                        tableBody += '</tr>';
                    }
                }
                $('#artikelTable tbody').html(tableBody);
            },
            error: function () {
                $('#artikelTable tbody').html('<tr><td colspan="4">Gagal memuat data.</td></tr>');
            }
        });
    }
    loadData();

    $('#btnTambah').on('click', function () {
        $('#formTitle').text('Tambah Artikel');
        $('#artikelId, #inputJudul, #inputIsi, #inputKategori').val('');
        $('#formContainer').slideDown();
    });
    $('#btnBatal').on('click', function () { $('#formContainer').slideUp(); });

    $('#btnSimpan').on('click', function () {
        var id = $('#artikelId').val(), judul = $('#inputJudul').val();
        if (judul === '') { alert('Judul tidak boleh kosong!'); return; }
        $.ajax({
            url: id ? "<?= base_url('ajax/update/') ?>" + id : "<?= base_url('ajax/add') ?>",
            method: "POST",
            data: { judul: judul, isi: $('#inputIsi').val(), id_kategori: $('#inputKategori').val() },
            dataType: "json",
            success: function (data) { if (data.status === 'OK') { $('#formContainer').slideUp(); loadData(); } },
            error: function () { alert('Gagal menyimpan data.'); }
        });
    });

    $(document).on('click', '.btn-edit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "<?= base_url('ajax/getById/') ?>" + $(this).data('id'),
            method: "GET", dataType: "json",
            success: function (data) {
                $('#formTitle').text('Edit Artikel');
                $('#artikelId').val(data.id);
                $('#inputJudul').val(data.judul);
                $('#inputIsi').val(data.isi);
                $('#inputKategori').val(data.id_kategori);
                $('#formContainer').slideDown();
                $('html, body').animate({ scrollTop: 0 }, 300);
            }
        });
    });

    $(document).on('click', '.btn-delete', function (e) {
        e.preventDefault();
        if (confirm('Yakin ingin menghapus artikel ini?')) {
            $.ajax({
                url: "<?= base_url('ajax/delete/') ?>" + $(this).data('id'),
                method: "DELETE", dataType: "json",
                success: function (data) { if (data.status === 'OK') loadData(); },
                error: function () { alert('Gagal menghapus data.'); }
            });
        }
    });
});
</script>

<?= $this->include('template/footer'); ?>