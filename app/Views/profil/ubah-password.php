<?= $this->extend('/layout/base'); ?>

<?= $this->section('content'); ?>
<main class="container round-border">
    <div class="header-box bright">
        <h1>Ubah Email dan Password</h1>
    </div>
    
      <?php d($email); ?>
      <form class="border" action="<?= base_url('profil/ubah-password/')?>" method="PUT">
        <div class="form-item">
            <span><label for="email">Email</label><strong>*</strong></span>
            <input type="email" id="email" name="email" value="<?= old('email') ? old('email') : $email ?>">
        </div>

        <div class="form-item">
            <span><label for="password">Password</label><strong>*</strong></span>
            <input type="password" id="password" name="password">
        </div>

        <div class="form-item">
            <span><label for="confirm_password">Ulangi Password</label><strong>*</strong></span>
            <input type="password" id="confirm_password" name="confirm_password">
        </div>
        
        <div class="form-item" style="justify-content:space-evenly">
        <input type="submit" class="btn very-bright" name="login" value="Submit">

    </div>
    <form>

</main>
<?= $this->endSection('content'); ?>