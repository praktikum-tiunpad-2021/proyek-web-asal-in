<?= $this->extend('/layout/base'); ?>

<?= $this->section('content'); ?>
<main class="container round-border">
    <div class="header-box bright">
        <h1>Formulir Edit Profile User</h1>
    </div>

    <form class="border" action="<?= base_url('admin/kelola-user/change-user-profile/' . $userProfileData['user_id']) ?>" method="POST">
        <?= $this->include('/layout/form-error'); ?>
        <?= csrf_field(); ?>

        <input type="hidden" name="_method" value="PUT"/>

        <div class="form-item">
            <span><label for="name">Nama</label></span>
            <input type="text" id="name" name="name" value="<?= old('name') ? old('name') : $userProfileData['name'] ?>">
        </div>

        <div class="form-item">
            <span><label for="gender">Jenis Kelamin</label></span>
            <select name="gender" id="gender">
                <option value="MALE">Male</option>
                <option value="FEMALE">Female</option>
                <option value="OTHER">Other</option>
            </select>
        </div>

        <div class="form-item">
            <span><label for="date_of_birth">Tanggal Lahir</label></span>
            <input type="date" id="date_of_birth" name="date_of_birth" value="<?= old('date_of_birth') ? old('date_of_birth') : $userProfileData['date_of_birth'] ?>">
        </div>

        <div class="form-item">
            <span><label for="address">Alamat</label></span>
            <input type="text" id="address" name="address" value="<?= old('address') ? old('address') : $userProfileData['address'] ?>">
        </div>

        <div class="form-item">
            <span><label for="status">Status</label></span>
            <select name="status" id="status">
                <option value="PELAJAR">Pelajar</option>
                <option value="MAHASISWA">Mahasiswa</option>
                <option value="UMUM">Umum</option>
                <option value="PENELITI">Peneliti</option>
            </select>
        </div>

        <div class="form-item">
            <span><label for="institution_name">Institusi</label></span>
            <input type="text" id="institution_name" name="institution_name" value="<?= old('institution_name') ? old('institution_name') : $userProfileData['institution_name'] ?>">
        </div>

        <div class="form-item">
            <span><label for="phone_number">No. Telp</label></span>
            <input type="text" id="phone_number" name="phone_number" value="<?= old('phone_number') ? old('phone_number') : $userProfileData['phone_number'] ?>">
        </div>

        <div class="form-item" style="justify-content:space-evenly">
        <input type="submit" class="btn very-bright" name="add" value="Ubah User Profile">
        </div>
    </form>
</main>
<?= $this->endSection('content'); ?>