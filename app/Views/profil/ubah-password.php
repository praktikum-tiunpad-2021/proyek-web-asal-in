<?= $this->extend('/layout/base'); ?>

<?= $this->section('content'); ?>
<main class="container round-border">
    <div class="header-box bright">
        <h1>Ubah Email dan Password</h1>
    </div>
    <div class="border">
      <?php d($email); ?>
    </div>
  </div>
</main>
<?= $this->endSection('content'); ?>