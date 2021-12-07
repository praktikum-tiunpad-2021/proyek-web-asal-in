<?= $this->extend('/layout/base'); ?>

<?= $this->section('content'); ?>
<main class="container round-border">
    <div class="header-box bright">
        <h1>Formulir Edit Buku</h1>
    </div>

    <form class="border" action="<?= base_url('admin/buku/change-book/' . $bookData['book_id']) ?>" method="POST">
        <?= $this->include('/layout/form-error'); ?>
        <?= csrf_field(); ?>

        <input type="hidden" name="_method" value="PUT"/>

        <div class="form-item">
            <span><label for="isbn">ISBN 13</label><strong>*</strong></span>
            <input type="number" id="isbn" name="isbn" value="<?= old('isbn') ? old('isbn') : $bookData['isbn'] ?>">
        </div>

        <div class="form-item">
            <span><label for="title">Judul Buku</label><strong>*</strong></span>
            <input type="text" id="title" name="title" value="<?= old('title') ? old('title') : $bookData['title'] ?>">
        </div>

        <div class="form-item">
            <span><label for="author">Pengarang</label><strong>*</strong></span>
            <input type="text" id="author" name="author" value="<?= old('author') ? old('author') : $bookData['author'] ?>">
        </div>

        <div class="form-item">
            <span><label for="publisher">Penerbit</label><strong>*</strong></span>
            <input type="text" id="publisher" name="publisher" value="<?= old('publisher') ? old('publisher') : $bookData['publisher'] ?>">
        </div>

        <div class="form-item">
            <span><label for="publication_date">Tanggal Terbit</label><strong>*</strong></span>
            <input type="date" id="publication_date" name="publication_date" value="<?= old('publication_date') ? old('publication_date') : $bookData['publication_date'] ?>">
        </div>

        <div class="form-item">
            <span><label for="pages">Jumlah Halaman</label><strong>*</strong></span>
            <input type="number" id="pages" name="pages" value="<?= old('pages') ? old('pages') : $bookData['pages'] ?>">
        </div>

        <div class="form-item">
            <span><label for="categories[]">Kategori</label></span>
            <select name="categories[]" id="categories[]" multiple size="2">
                <?php foreach($categories as $category): ?>
                    <option value="<?= $category['category_id']; ?>"><?= $category['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-item">
            <span><label for="status">Status</label></span>
            <select name="status" id="status">
                <option value="BORROWED" hidden>Dipinjam</option>
                <option value="BOOKED" hidden>Dipesan</option>
                <option value="UNAVAILABLE">Tidak Tersedia</option>
                <option value="AVAILABLE">Tersedia</option>
            </select>
        </div>

        <div class="form-item" style="justify-content:space-evenly">
        <input type="submit" class="btn very-bright" name="add" value="Ubah Buku">
        </div>
    </form>
</main>
<?= $this->endSection('content'); ?>

<?= $this->section('custom_script'); ?>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        let status = <?php echo(json_encode(old('status') ? old('status') : $bookData['status'])) ?>;
        let statusElement = document.getElementById("status");

        for (let i = 0; i < statusElement.options.length; i++){
            if (statusElement.options[i].value == status){
                statusElement.options[i].selected = true;
            }
        }

        if (status == "BOOKED" || status == "BORROWED") statusElement.setAttribute("disabled", "disabled");


        let categories = <?php echo(json_encode(old('categories') ? old('categories') : $bookData['categories'])) ?>;
        if (categories == "") return;
        let categoriesElement = document.getElementById("categories[]");

        for (let i = 0; i < categoriesElement.options.length; i++){
            categories.forEach(element => {
                if (element == categoriesElement.options[i].value){
                    categoriesElement.options[i].selected = true;
                    return;
                }
            });
        }
    });
</script>
<?= $this->endSection('custom_script'); ?>
