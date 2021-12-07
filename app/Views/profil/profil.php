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
  <h1 class="header-padding">Profil</h1>
  <div>
    <div>
      <span>Nama</span><?= $userData['name']; ?>
    </div>
    <div>
      <span>Jenis Kelamin</span><?= $userData['gender'] == 'MALE' ? 'Laki-laki' :
                                    ($userData['gender'] == 'FEMALE' ? 'Perempuan' :
                                    'Lainnya'); ?>
    </div>
    <div>
      <span>Tanggal Lahir</span><?= $userData['date_of_birth']; ?>
    </div>
    <div>
      <span>Alamat</span><?= $userData['address']; ?>
    </div>
    <div>
      <span>Status</span><?= $userData['status'] != '' ? ucwords(strtolower($userData['status'])) : 'Lainnya' ; ?>
    </div>
    <div>
      <span>Institusi</span><?= $userData['institution_name']; ?>
    </div>
    <div>
      <span>No. Telepon</span><?= $userData['phone_number']; ?>
    </div>
    <div>
      <span>Email</span><?= $userData['email']; ?>
    </div>
    
  </div>  

  <div style="padding-top: 1em;">
    <a href="<?= base_url('profil/ubah') ?>" class="btn very-bright">Ubah Profil</a>
    <a href="<?= base_url('profil/ubah-password') ?>" class="btn very-bright">Ubah Email/Password</a>
  </div>

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
          <th scope="col">Judul Buku</th>
          <th scope="col">Tanggal Peminjaman</th>
          <th scope="col">Tanggal Pengembalian</th>
          <th scope="col">Status</th>
        </tr>
        <?php $i = 1; foreach($borrowData as $borrowItem): ?>
        <tr>
          <td scope="row" style="text-align:center"><?= $i; ?></td>
          <td><a href="<?= base_url('buku/detail/' . $borrowItem['book_id']); ?>"><?= $borrowItem['title']; ?></a></td>
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
    Kamu tidak pernah meminjam!
  <?php endif; ?>
</main>
<?= $this->endSection('content'); ?>