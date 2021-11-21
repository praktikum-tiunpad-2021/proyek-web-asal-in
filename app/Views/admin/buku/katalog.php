<?= $this->extend('/layout/base'); ?>

<?= $this->section('content'); ?>
<main class="container">
  <h1>
    Katalog Buku
  </h1>
  <div style="margin-bottom: 2em;">
    <a href="<?= base_url('admin/buku/tambah'); ?>" class="btn very-bright">Tambah buku</a>
  </div>
  <div>
    <table>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">ISBN 13</th>
        <th scope="col">Judul Buku</th>
        <th scope="col">Pengarang</th>
        <th scope="col">Penerbit</th>
        <th scope="col">Tanggal Terbit</th>
        <th scope="col">Halaman</th>
        <th scope="col">Status</th>
        <th scope="col">Aksi</th>
      </tr>
      <?php $i = 1; foreach($books as $book): ?>
        <td scope="row"><?= $i; ?></td>
        <td style="font-size: 0.75em;"><?= $book['isbn']; ?></td>
        <td><?= $book['name']; ?></td>
        <td><?= $book['author']; ?></td>
        <td><?= $book['publisher']; ?></td>
        <td><?= $book['publication_date']; ?></td>
        <td><?= $book['pages']; ?></td>
        <td><?= $book['status']; ?></td>
        <td><a href="<?= base_url('admin/buku/ubah/' . $book['book_id']); ?>" class="btn very-bright">Ubah</a></td>
      <?php endforeach; ?>
    </table>
  </div>
</main>
<?= $this->endSection('content'); ?>