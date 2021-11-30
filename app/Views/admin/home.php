<?= $this->extend('/layout/base'); ?>

<?= $this->section('content'); ?>
<main class="container">
  <a href="<?= base_url('admin/buku/katalog'); ?>" class="btn very-bright">Katalog Buku</a>
  <a href="<?= base_url('admin/peminjaman'); ?>" class="btn very-bright">Tabel Peminjaman</a>
  <a href="<?= base_url('admin/kelola-user/user'); ?>" class="btn very-bright">Kelola User</a>
</main>
<?= $this->endSection('content'); ?>