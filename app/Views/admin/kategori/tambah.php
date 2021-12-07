<?= $this->extend('/layout/base'); ?>

<?= $this->section('content'); ?>
<main class="container round-border">
    <div class="header-box bright">
        <h1>Tambahkan Kategori</h1>
    </div>

    <form class="border" action="<?= base_url('admin/kategori/change-category') ?>" method="POST">
        <?= $this->include('/layout/form-error'); ?>
        <?= csrf_field(); ?>

        <div class="form-item">
            <span><label for="name">Nama Kategori</label><strong>*</strong></span>
            <input type="text" id="name" name="name" value="<?= old('name') ? old('name') : '' ?>">
        </div>

        <div class="form-item" style="justify-content:space-evenly">
        <input type="submit" class="btn very-bright" name="add" value="Tambah Kategori">
        </div>
    </form>
</main>
<?= $this->endSection('content'); ?>
