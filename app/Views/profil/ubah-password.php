<?= $this->extend('/layout/base'); ?>

<?= $this->section('content'); ?>
<main class="container round-border">
    <div class="header-box bright">
        <h1>Ubah Email dan Password</h1>
    </div>
      <form class="border" action="<?= base_url('profil/save-password/')?>" method="POST">
        <?= $this->include('/layout/form-error'); ?>
        <?= csrf_field(); ?>

        <input type="hidden" name="_method" value="PUT"/>

        <div class="form-item">
            <span><label for="old_password">Password Lama</label><strong>*</strong></span>
            <input type="password" id="old_password" name="old_password">
        </div>

        <div class="form-item">
            <span><label for="email">Email Baru</label></span>
            <input type="email" id="email" name="email" value="<?= old('email') ? old('email') : " " ?>">
        </div>

        <div class="form-item">
            <span><label for="password">Password Baru</label></span>
            <input type="password" id="password" name="password">
        </div>

        <div class="form-item">
            <span><label for="confirm_password">Konfirmasi Password Baru</label></span>
            <input type="password" id="confirm_password" name="confirm_password">
        </div>
        
        <div class="form-item" style="justify-content:space-evenly">
        <input type="submit" class="btn very-bright" name="login" value="Submit">

    </div>
    <form>

</main>
<?= $this->endSection('content'); ?>