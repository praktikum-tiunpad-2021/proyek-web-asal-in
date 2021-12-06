<?= $this->extend('/layout/base'); ?>

<?= $this->section('content'); ?>
<main class="container">
  <h1 class="header-padding">
    Katalog Buku
  </h1>

  <form action="<?= base_url('buku/katalog/'); ?>" method="GET" style="display: flex; padding-bottom: 1em;">
    <input type="text" style="margin-right:1em;" placeholder="Search.." name="keyword" value="<?= isset($keyword) ? $keyword : ''; ?>">
    <button class="btn very-bright" type="submit">Cari</button>
  </form>

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
      <?php $i = (($pager->getCurrentPage() - 1) * $pager->getPerPage()) + 1; foreach($books as $book): ?>
      <tr>
        <td scope="row" style="text-align:center"><?= $i; ?></td>
        <td style="font-size: 0.75em; text-align:center"><?= $book['isbn']; ?></td>
        <td><?= $book['title']; ?></td>
        <td><?= $book['author']; ?></td>
        <td style="text-align:center">
          <?php if ($book['status'] == 'AVAILABLE'): ?>
            Tersedia
          <?php elseif ($book['status'] == 'BORROWED'): ?>
            Dipinjam
          <?php elseif ($book['status'] == 'BOOKED'): ?>
            Dipesan
          <?php else: ?>
            Tidak Tersedia
          <?php endif; ?>
        </td>
        <td style="text-align:center">
          <a href="<?= base_url('buku/detail/' . $book['book_id']); ?>" class="btn very-bright">Detail</a>
          <?php if ($book['status'] == 'AVAILABLE' || $book['status'] == 'BOOKED'): ?>
            <a href="<?= base_url('buku/pinjam/' . $book['book_id']); ?>" class="btn very-bright">Pinjam</a>
          <?php endif; ?>
        </td>
      </tr>
      <?php $i++; endforeach; ?>
    </table>
    <?= $pager->links() ?> 
  </div>
</main>
<?= $this->endSection('content'); ?>