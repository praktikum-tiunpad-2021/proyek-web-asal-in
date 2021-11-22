<?= $this->extend('/layout/base'); ?>

<?= $this->section('content'); ?>
<style>
span {
  width: 150px;
  line-height: 2em;
  display: inline-block;
  align-items: center;
  font-weight: bold;
}
</style>
<main class="container">
  <h1>Profil</h1>
  <?php d($userData); ?>
  
  <div>
    <div>
      <span>Nama</span><?= $userData['name']; ?>
    </div>
    <div>
      <span>Jenis Kelamin</span><?= $userData['gender']; ?>
    </div>
    <div>
      <span>Tanggal Lahir</span><?= $userData['date_of_birth']; ?>
    </div>
    <div>
      <span>Alamat</span><?= $userData['address']; ?>
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

  </div>
    <a href="<?= base_url('profil/ubah') ?>" class="btn bright">Ubah Profil</a>
    <a href="<?= base_url('profil/ubah-password') ?>" class="btn bright">Ubah Email/Password</a>
  </div>
</main>
<?= $this->endSection('content'); ?>