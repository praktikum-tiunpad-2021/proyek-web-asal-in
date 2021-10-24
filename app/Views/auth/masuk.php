<?= $this->extend('/layout/base'); ?>

<?= $this->section('content'); ?>
<main class="login-container">
    <h1 class="bright">MASUK</h1>
    <form class="border" action="/login" method="POST">
        <div class="form-item">
            <label for="user_id">Nomor Anggota</label>
            <input type="text" id="user_id" name="user_id" autofocus>
        </div>
        
        <div class="form-item">
            <label for="password">Kata Sandi</label>
            <input type="password" id="password" name="password">
        </div>

        <div class="form-item" style="margin-top: 1em;">
            <input type="submit" class="btn very-bright" style="padding:0.75em;" name="login" value="Masuk">
        </div>
        <div style="text-align: center;">Belum punya akun? <a href="/daftar">Daftar disini</a></div>
    </form>
</main>
<?= $this->endSection('content'); ?>