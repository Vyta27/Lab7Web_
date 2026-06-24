<?= $this->include('template/admin_header'); ?>

<h2><?= $title; ?></h2>

<form id="search-form" class="form-search">
    <input type="text" name="q" id="search-box" value="<?= $q; ?>" 
           placeholder="Cari judul artikel">
    <select name="kategori_id" id="category-filter">
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

<!-- Tombol Sorting -->
<div style="margin-bottom:10px; margin-top:10px;">
    <span style="font-weight:600; font-size:13px; color:#9e1068;">Urutkan:</span>
    <button class="btn-sort btn" data-sort="artikel.id" data-order="asc">ID ↑</button>
    <button class="btn-sort btn" data-sort="artikel.id" data-order="desc">ID ↓</button>
    <button class="btn-sort btn" data-sort="artikel.judul" data-order="asc">Judul A-Z</button>
    <button class="btn-sort btn" data-sort="artikel.judul" data-order="desc">Judul Z-A</button>
    <button class="btn-sort btn" data-sort="kategori.nama_kategori" data-order="asc">Kategori A-Z</button>
</div>

<!-- Loading indicator -->
<div id="loading" style="display:none; padding:20px; text-align:center; color:#eb2f96;">
    ⏳ Memuat data...
</div>

<!-- Container artikel dan pagination -->
<div id="article-container"></div>
<div id="pagination-container"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {

    const articleContainer    = $('#article-container');
    const paginationContainer = $('#pagination-container');
    const loading             = $('#loading');

    let currentSort  = 'artikel.id';
    let currentOrder = 'asc';

    const fetchData = (url) => {
        loading.show();
        articleContainer.hide();
        paginationContainer.hide();

        let separator = url.includes('?') ? '&' : '?';
        url = `${url}${separator}sort=${currentSort}&order=${currentOrder}`;

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            success: function (data) {
                renderArticles(data.artikel);
                renderPagination(data.pager, data.q, data.kategori_id);
                loading.hide();
                articleContainer.show();
                paginationContainer.show();
            },
            error: function () {
                loading.hide();
                articleContainer.html('<p style="color:red;">Gagal memuat data.</p>').show();
            }
        });
    };

    const renderArticles = (articles) => {
        let html = '<table class="table">';
        html += '<thead><tr><th>ID</th><th>Judul</th><th>Kategori</th><th>Status</th><th>Aksi</th></tr></thead>';
        html += '<tbody>';

        if (articles && articles.length > 0) {
            articles.forEach(article => {
                html += `
                <tr>
                    <td>${article.id}</td>
                    <td>
                        <b>${article.judul}</b>
                        <p><small>${article.isi ? article.isi.substring(0, 50) : ''}</small></p>
                    </td>
                    <td>${article.nama_kategori ?? '-'}</td>
                    <td>${article.status == 1 ? 'Aktif' : 'Draft'}</td>
                    <td>
                        <a class="btn" href="/admin/artikel/edit/${article.id}">Ubah</a>
                        <a class="btn btn-danger" onclick="return confirm('Yakin menghapus data?');"
                           href="/admin/artikel/delete/${article.id}">Hapus</a>
                    </td>
                </tr>`;
            });
        } else {
            html += '<tr><td colspan="5">Tidak ada data.</td></tr>';
        }

        html += '</tbody></table>';
        articleContainer.html(html);
    };

    const renderPagination = (pager, q, kategori_id) => {
        if (!pager || !pager.links || pager.links.length <= 1) {
            paginationContainer.html('');
            return;
        }

        let html = '<ul class="pagination">';
        pager.links.forEach(link => {
            let url = link.url ? `${link.url}&q=${q ?? ''}&kategori_id=${kategori_id ?? ''}` : '#';
            html += `<li class="page-item ${link.active ? 'active' : ''}">
                        <a class="page-link ajax-page" href="${url}">${link.title}</a>
                     </li>`;
        });
        html += '</ul>';
        paginationContainer.html(html);
    };

    $('#search-form').on('submit', function (e) {
        e.preventDefault();
        const q           = $('#search-box').val();
        const kategori_id = $('#category-filter').val();
        fetchData(`/admin/artikel?q=${q}&kategori_id=${kategori_id}`);
    });

    $('#category-filter').on('change', function () {
        $('#search-form').trigger('submit');
    });

    $(document).on('click', '.ajax-page', function (e) {
        e.preventDefault();
        const url = $(this).attr('href');
        if (url !== '#') fetchData(url);
    });

    // Tombol sorting
    $(document).on('click', '.btn-sort', function () {
        $('.btn-sort').css('opacity', '1');
        $(this).css('opacity', '0.6');
        currentSort  = $(this).data('sort');
        currentOrder = $(this).data('order');
        const q           = $('#search-box').val();
        const kategori_id = $('#category-filter').val();
        fetchData(`/admin/artikel?q=${q}&kategori_id=${kategori_id}`);
    });

    // Load data awal
    fetchData('/admin/artikel');
});
</script>

<?= $this->include('template/admin_footer'); ?>