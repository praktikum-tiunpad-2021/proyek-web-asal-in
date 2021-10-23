<?= $this->extend('/layout/base'); ?>

<?= $this->section('content'); ?>
<main class="login-container">
    <h1 class="bright">MASUK</h1>
    <form>
        <div class="form-item">
            <label>Nomor Anggota</label>
            <input type="text" id="namaanggota">
        </div>
        
        <div class="form-item">
            <label>Kata Sandi</label>
            <input type="text" id="password">
        </div>

        <div class="form-item">
            <input type="submit" class="btn very-bright" name="login" value="Masuk">
        </div>
        <div style="text-align: center;">Belum punya akun? <a href="/daftar">Daftar disini</a></div>
    </form>
</main>
<?= $this->endSection('content'); ?>