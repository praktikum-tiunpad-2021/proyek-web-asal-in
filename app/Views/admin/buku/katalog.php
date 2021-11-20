<?= $this->extend('/layout/base'); ?>

<?= $this->section('content'); ?>
<main class="container">
  <h1>Katalog Buku</h1>
  <a href="<?= base_url('admin/buku/tambah'); ?>" class="btn very-bright">Tambah buku</a>
</main>
<?= $this->endSection('content'); ?>