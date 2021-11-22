<?= $this->extend('/layout/base'); ?>

<?= $this->section('content'); ?>
<main class="container">
  <h1>Profil</h1>
  <?php d($userData); ?>
  <div style="display:inline-block;">
    
    <a href="<?= base_url('profil/ubah') ?>" class="btn bright">Ubah Profil</a>
    <a href="<?= base_url('profil/ubah-password') ?>" class="btn bright">Ubah Email/Password</a>
  </div>
</main>
<?= $this->endSection('content'); ?>