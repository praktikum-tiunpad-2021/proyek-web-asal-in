<?= $this->extend('/layout/base'); ?>

<?= $this->section('content'); ?>
<main class="container">
  <h1 class="header-padding">
    Daftar User
  </h1>
  <!-- <div style="margin-bottom: 2em;">
    <a href="<?= base_url('admin/kelola-user/tambah'); ?>" class="btn very-bright">Tambah user</a>
  </div> -->
  <div style="overflow-x: auto;">
    <table style="width: 100%; min-width: 1000px">
      <colgroup>
        <col>
        <col>
        <col style="width:40%">
        <col>
        <col>
        <col style="width:13%;">
        <col>
        <col style="width:15%">
        <col style="width:fit-content">
      </colgroup>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">User ID</th>
        <th scope="col">Nama</th>
        <th scope="col">Jenis Kelamin</th>
        <th scope="col">Tanggal Lahir</th>
        <th scope="col">Alamat</th>
        <th scope="col">Status</th>
        <th scope="col">Institusi</th>
        <th scope="col">Nomor Telepon</th>
        <th scope="col">Aksi</th>
      </tr>
      <?php $i = 1; foreach($user_profiles as $user): ?>
      <tr>
        <td scope="row" style="text-align:center"><?= $i; ?></td>
        <td style="font-size: 0.75em; text-align:center;"><?= $user['user_id']; ?></td>
        <td style="text-align:center"><?= $user['name']; ?></td>
        <td style="text-align:center"><?= $user['gender']; ?></td>
        <td style="text-align:center"><?= $user['date_of_birth']; ?></td>
        <td style="text-align:center"><?= $user['address']; ?></td>
        <td style="text-align:center"><?= $user['status']; ?></td>
        <td style="text-align:center"><?= $user['institution_name']; ?></td>
        <td style="text-align:center"><?= $user['phone_number']; ?></td>
        <td style="text-align:center"><a href="<?= base_url('admin/kelola-user/ubah-profile/' . $user['user_id']); ?>" class="btn very-bright">Ubah</a></td>
      </tr>
      <?php $i++; endforeach; ?>
    </table>
    
    <br><br>
    <HR WIDTH="50%" SIZE="10" NOSHADE>
    <h1 class="header-padding">
    Daftar Role User
    </h1>
    <table style="width: 100%; min-width: 1000px">
      <colgroup>
        <col>
        <col>
        <col style="width:40%">
        <col>
        <col>
        <col style="width:13%;">
        <col>
        <col style="width:15%">
        <col style="width:fit-content">
      </colgroup>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">User ID</th>
        <th scope="col">Alamat E-mail</th>
        <th scope="col">Role</th>
        <th scope="col">Aksi</th>
      </tr>
      <?php $i = 1; foreach($users as $user): ?>
      <tr>
        <td scope="row" style="text-align:center"><?= $i; ?></td>
        <td style="font-size: 0.75em; text-align:center;"><?= $user['user_id']; ?></td>
        <td style="text-align:center"><?= $user['email']; ?></td>
        <td style="text-align:center"><?= $user['role']; ?></td>
        <td style="text-align:center"><a href="<?= base_url('admin/kelola-user/ubah/' . $user['user_id']); ?>" class="btn very-bright">Ubah</a></td>
      </tr>
      <?php $i++; endforeach; ?>
    </table>
    <!--Pager links-->
    <?= $pager->links('users') ?> 

    <br><br><br><br>
  </div>
</main>
<?= $this->endSection('content'); ?>