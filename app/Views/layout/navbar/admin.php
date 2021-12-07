<a class="nav-item" href="<?= base_url('buku/katalog') ?>">Katalog Buku</a>
<a class="nav-item" href="<?= base_url('hubungi') ?>">Hubungi</a>

<div class="button-container dropdown">
  <a class="btn gold">Admin</a>
  <div class="dropdown-content">
    <a href="<?= base_url('admin/buku/katalog'); ?>">Katalog Buku</a>
    <a href="<?= base_url('admin/peminjaman'); ?>">Tabel Peminjaman</a>
    <a href="<?= base_url('admin/kelola-user/user'); ?>">Kelola User</a>
  </div>
</div>
<div class="button-container">
  <a href="<?= base_url('profil') ?>" class="btn gold">Profil</a>
</div>
<div class="button-container">
  <a href="<?= base_url('logout') ?>" class="btn very-bright">Keluar</a>
</div>
