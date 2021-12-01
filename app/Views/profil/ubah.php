<?= $this->extend('/layout/base'); ?>

<?= $this->section('content'); ?>
<main class="container round-border">
    <div class="header-box bright">
        <h1>Ubah Profil</h1>
    </div>
    <form class="border" action="<?= base_url('profil/save-profile')?>" method="PUT">
        <?= $this->include('/layout/form-error'); ?>
        <?= csrf_field(); ?>

        <div class="form-item">
            <span><label for="name">Nama</label><strong>*</strong></span>
            <input type="text" id="name" name="name" value="<?= old('name') ? old('name') : $userData['name'] ?>">
        </div>

        <div class="form-item">
            <span><label for="gender">Jenis Kelamin</label></span>
            <span>
                <input type="radio" name="gender" id="male" value="male">
                <label for="male">Laki-laki</label>
            </span>
            <span>
                <input type="radio" name="gender" id="female" value="female">
                <label for="female">Perempuan</label>
            </span>
        </div>
        
        <div class="form-item">
            <span><label for="date_of_birth">Tanggal Lahir</label></span>
            <input type="date" id="date_of_birth" name="date_of_birth" value="<?= old('date_of_birth') ? old('date_of_birth') : $userData['date_of_birth'] ?>">
        </div>

        <div class="form-item">
            <span><label for="address">Alamat</label></span>
            <textarea id="address" name="address"><?= old('address') ? old('address') : $userData['address'] ?></textarea>
        </div>
        
        <div class="form-item">
            <span><label for="status">Status</label></span>
            <select name="status" id="status">
                <option value="" selected>Pilih</option>
                <option value="Pelajar">Pelajar</option>
                <option value="Mahasiswa">Mahasiswa</option>
                <option value="Umum">Umum</option>
                <option value="Peneliti">Peneliti</option>
                <option value="Karyawan">Karyawan</option>
            </select>
        </div>
        
        <div class="form-item">
            <span><label for="institution_name">Nama Institusi</label></span>
            <input type="text" id="institution_name" name="institution_name" value="<?= old('institution_name') ? old('institution_name') : $userData['institution_name'] ?>">
        </div>

        <div class="form-item">
            <span><label for="phone_number">Nomor Telepon</label></span>
            <input type="number" id="phone_number" name="phone_number" value="<?= old('phone_number') ? old('phone_number') : $userData['phone_number'] ?>">
        </div>

        <div class="form-item" style="justify-content:space-evenly">
            <input type="submit" class="btn very-bright" name="add" value="Ubah Profil">
        </div>
    </form>
</main>
<?= $this->endSection('content'); ?>