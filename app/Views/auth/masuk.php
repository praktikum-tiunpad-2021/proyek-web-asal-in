<?= $this->extend('/layout/base'); ?>

<?= $this->section('content'); ?>
    <form>
        <div class="form-group">
            <label>Nama Anggota :</label>
            <input type="text" class="form-control" id="namaanggota"><br>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Kata Sandi :</label>
            <input type="text"  class="form-control" id="password"><br><br>
        <!-- Buat lupa password -->
        <input type="submit" name="login"><br>
        </div>
        <span>Belum punya akun ? <a href="/daftar">Daftar disini</a></span>
    </form>
<?= $this->endSection('content'); ?>