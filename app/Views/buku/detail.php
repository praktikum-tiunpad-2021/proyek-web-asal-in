<?= $this->extend('/layout/base'); ?>

<?= $this->section('content'); ?>
<main class="container">
  <h1><?= $bookData['name']; ?></h1>
</main>
<?= $this->endSection('content'); ?>