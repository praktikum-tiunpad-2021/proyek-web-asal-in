<?= $this->extend('/layout/base'); ?>

<?= $this->section('content'); ?>
<main class="container">
  <h1 class="header-padding">
    Katalog Buku
  </h1>

  <div style="margin-bottom: 2em;">
    <a href="<?= base_url('admin/kategori/tambah'); ?>" class="btn very-bright">Tambah Kategori</a>
  </div>

  <div>
    <table style="width:100%;">
      <colgroup>
        <col style="width:5%">
        <col>
        <col style="width:10%">
      </colgroup>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Nama Kategori</th>
        <th scope="col">Aksi</th>
      </tr>
      <?php $i = 1; foreach($categories as $category): ?>
      <tr>
        <td scope="row" style="text-align:center"><?= $i; ?></td>
        <td style="text-align:center"><?= $category['name']; ?></td>
        <td style="text-align:center">
          <a href="<?= base_url('admin/kategori/ubah/' . $category['category_id']); ?>" class="btn very-bright">Ubah</a>
        </td>
      </tr>
      <?php $i++; endforeach; ?>
    </table>
  </div>
</main>
<?= $this->endSection('content'); ?>