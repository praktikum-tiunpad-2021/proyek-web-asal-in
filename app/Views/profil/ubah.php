<?= $this->extend('/layout/base'); ?>

<?= $this->section('content'); ?>
<main class="container round-border">
    <div class="header-box bright">
        <h1>Ubah Profil</h1>
    </div>
    <div class="border">
      <?php d($userData); ?>
    </div>
  </div>
</main>
<?= $this->endSection('content'); ?>