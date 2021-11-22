<?= $this->extend('/layout/base'); ?>

<?= $this->section('custom_css'); ?>
<style>
span {
  width: 150px;
  line-height: 2em;
  display: inline-block;
  align-items: center;
  font-weight: bold;
}
</style>
<?= $this->endSection('custom_css'); ?>

<?= $this->section('content'); ?>
<main class="container">
  <h1>
    Detail Buku
  </h1>

  <div>
    <div>
      <span>Judul</span><?= $bookData['name']; ?>
    </div>
    <div>
      <span>Penulis</span><?= $bookData['author']; ?>
    </div>
    <div>
      <span>Penerbit</span><?= $bookData['publisher']; ?>
    </div>
    <div>
      <span>Tanggal Terbit</span><?= $bookData['publication_date']; ?>
    </div>
    <div>
      <span>Halaman</span><?= $bookData['pages']; ?>
    </div>
    <div>
      <span>ISBN</span><?= $bookData['isbn']; ?>
    </div>
  </div>

  <h1>
    Riwayat Peminjaman
  </h1>

  <?php if (!empty($borrowData)): ?>
    <div>
      <table style="width:100%;">
        <colgroup>
          <col>
          <col style="width:40%">
        </colgroup>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Nama Peminjam</th>
          <th scope="col">Tanggal Peminjaman</th>
          <th scope="col">Tanggal Pengembalian</th>
          <th scope="col">Status</th>
        </tr>
        <?php $i = 1; foreach($borrowItem as $borrowData): ?>
          <td scope="row" style="text-align:center"><?= $i; ?></td>
          <td><?= $borrowItem['name']; ?></td>
          <td><?= $book['borrowing_date']; ?></td>
          <td><?= $book['returning_date']; ?></td>
          <td style="text-align:center">
            <?php if ($book['status'] == 'RETURNED'): ?>
              Dikembalikan
            <?php elseif ($book['status'] == 'IN_PROGRESS'): ?>
              Dipinjam
              <?php elseif ($book['status'] == 'BOOKED'): ?>
              Dipesan
            <?php endif; ?>
          </td>
        <?php endforeach; ?>
      </table>
    </div>
  <?php else: ?>
    Tidak ada data peminjaman!
  <?php endif; ?>
</main>
<?= $this->endSection('content'); ?>