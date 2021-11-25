<?= $this->extend('/layout/base'); ?>

<?= $this->section('content'); ?>
<main class="container">
  <h1 class="header-padding">
    Daftar Peminjaman Buku
  </h1>
  <?php if (!empty($borrowData)): ?>
    <div style="overflow-x: auto;">
      <table style="width:100%; min-width:1024px">
        <colgroup>
          <col>
          <col style="width:10%;">
          <col style="width:25%;">
          <col>
          <col>
          <col>
          <col>
          <col style="width:18%;">
        </colgroup>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Nama Peminjam</th>
          <th scope="col">Nama Buku</th>
          <th scope="col">Tanggal Pengajuan</th>
          <th scope="col">Tanggal Peminjaman</th>
          <th scope="col">Tanggal Pengembalian</th>
          <th scope="col">Status</th>
          <th scope="col">Aksi</th>
        </tr>
        <?php $i = 1; foreach($borrowData as $borrowItem): ?>
        <tr>
          <td scope="row" style="text-align:center"><?= $i; ?></td>
          <td><?= $borrowItem['user_name']; ?></td>
          <td><a href="<?= base_url('buku/detail/' . $borrowItem['book_id']); ?>"><?= $borrowItem['book_name']; ?></a></td>
          <td style="text-align:center"><?= $borrowItem['reservation_date']; ?></td>
          <td style="text-align:center"><?= $borrowItem['borrowing_date'] ? $borrowItem['borrowing_date'] : '-'; ?></td>
          <td style="text-align:center"><?= $borrowItem['returning_date']; ?></td>
          <td style="text-align:center">
            <?php if ($borrowItem['status'] == 'RETURNED'): ?>
              Dikembalikan
            <?php elseif ($borrowItem['status'] == 'IN_PROGRESS'): ?>
              Dipinjam
            <?php elseif ($borrowItem['status'] == 'BOOKED'): ?>
              Dipesan
            <?php else: ?>
              Dibatalkan
            <?php endif; ?>
          </td>
          <td style="text-align:center">
            <?php if ($borrowItem['status'] == 'IN_PROGRESS'): ?>
              <a class="btn very-bright">Buku Dikembalikan</a>
            <?php elseif ($borrowItem['status'] == 'BOOKED'): ?>
              <a class="btn very-bright">Buku Dipinjam</a>
              <a class="btn very-bright">Batal Meminjam</a>
            <?php endif; ?>
          </td>
        </tr>
        <?php $i++; endforeach; ?>
      </table>
    </div>
  <?php endif; ?>
</main>
<?= $this->endSection('content'); ?>