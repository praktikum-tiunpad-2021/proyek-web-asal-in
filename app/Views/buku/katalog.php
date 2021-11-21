<?= $this->extend('/layout/base'); ?>

<?= $this->section('content'); ?>
<main class="container">
  <h1>
    Katalog Buku
  </h1>
  <div>
    <table style="width:100%;">
      <colgroup>
        <col>
        <col>
        <col style="width:40%">
        <col>
        <col style="width:15%">
        <col style="width:10%">
      </colgroup>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">ISBN 13</th>
        <th scope="col">Judul Buku</th>
        <th scope="col">Pengarang</th>
        <th scope="col">Status</th>
        <th scope="col">Aksi</th>
      </tr>
      <?php $i = 1; foreach($books as $book): ?>
        <td scope="row" style="text-align:center"><?= $i; ?></td>
        <td style="font-size: 0.75em; text-align:center"><?= $book['isbn']; ?></td>
        <td><?= $book['name']; ?></td>
        <td><?= $book['author']; ?></td>
        <td style="text-align:center">
          <?php if ($book['status'] == 'AVALIABLE'): ?>
            Tersedia
          <?php elseif ($book['status'] == 'BORROWED'): ?>
            Dipesan
          <?php elseif ($book['status'] == 'BOOKED'): ?>
            Dipinjam
          <?php else: ?>
            Tidak Tersedia
          <?php endif; ?>
        </td>
        <td style="text-align:center">
          <a href="<?= base_url('buku/detail/' . $book['book_id']); ?>" class="btn very-bright">Detail</a>
          <?php if ($book['status'] == 'AVALIABLE' || $book['status'] == 'BOOKED'): ?>
            <a class="btn very-bright">Pinjam</a>
          <?php endif; ?>
        </td>
      <?php endforeach; ?>
    </table>
  </div>
</main>
<?= $this->endSection('content'); ?>