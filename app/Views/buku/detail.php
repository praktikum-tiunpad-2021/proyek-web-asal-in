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
  <h1 class="header-padding">
    Detail Buku
  </h1>

  <div>
    <div>
      <span>Judul</span><?= $bookData['title']; ?>
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

  <a href="<?= base_url('buku/pinjam/' . $bookData['book_id']); ?>" class="btn very-bright">Pinjam</a>

  <h1 class="header-padding">
    Riwayat Peminjaman
  </h1>

  <?php if (!empty($borrowData)): ?>
    <div style="overflow-x: auto;">
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
        <?php $i = 1; foreach($borrowData as $borrowItem): ?>
        <tr>
          <td scope="row" style="text-align:center"><?= $i; ?></td>
          <td style="text-align:center"><?= $borrowItem['name']; ?></td>
          <td style="text-align:center"><?= $borrowItem['borrowing_date'] ? $borrowItem['borrowing_date'] : '-'; ?></td>
          <td style="text-align:center"><?= $borrowItem['returning_date'] ? $borrowItem['returning_date'] : '-';?></td>
          <td style="text-align:center">
            <?php if ($borrowItem['status'] == 'RETURNED'): ?>
              Dikembalikan
            <?php elseif ($borrowItem['status'] == 'IN_PROGRESS'): ?>
              Dipinjam
              <?php elseif ($borrowItem['status'] == 'BOOKED'): ?>
              Dipesan
            <?php endif; ?>
          </td>
        </tr>
        <?php $i++; endforeach; ?>
      </table>
    </div>
  <?php else: ?>
    Tidak ada data peminjaman!
  <?php endif; ?>
</main>
<?= $this->endSection('content'); ?>