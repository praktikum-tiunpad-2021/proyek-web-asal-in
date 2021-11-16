<?= $this->extend('/layout/base'); ?>

<?= $this->section('content'); ?>
<main class="login-container round-border">
    <div class="header-box bright">
        <h1>MASUK</h1>
    </div>
    <form class="border" action="/login" method="POST">
        <div class="form-item">
            <label for="user_id">Nomor Anggota</label>
            <input type="text" id="user_id" name="user_id" autofocus value="<?= old('user_id') ? old('user_id') : '' ?>">
        </div>
        
        <div class="form-item">
            <label for="password">Kata Sandi</label>
            <input type="password" id="password" name="password">
        </div>

        <div>
            <input type="checkbox" id="stay_logged_in" name="stay_logged_in"><label for="stay_logged_in" style="margin-left: 5px">Tetap Masuk</label>
        </div>

        <div class="form-item">
            <input type="submit" class="btn very-bright" style="padding:0.75em;" name="login" value="Masuk">
        </div>
        <div style="text-align: center;">Belum punya akun? <a href="<?= base_url('daftar') ?>">Daftar disini</a></div>
    </form>
</main>
<?= $this->endSection('content'); ?>