<?= $this->extend('/layout/base'); ?>

<?= $this->section('content'); ?>
<main class="container round-border">
    <div class="header-box bright">
        <h1>Formulir Edit User</h1>
    </div>

    <form class="border" action="<?= base_url('admin/kelola-user/change-user/' . $userData['user_id']) ?>" method="POST">
        <?= $this->include('/layout/form-error'); ?>
        <?= csrf_field(); ?>

        <input type="hidden" name="_method" value="PUT"/>

        <div class="form-item">
            <span><label for="email">E-mail</label></span>
            <input type="email" id="email" name="email" value="<?= old('email') ? old('email') : $userData['email'] ?>">
        </div>

        <div class="form-item">
            <span><label for="role">Role</label></span>
            <select name="role" id="role">
                <option value="USER">USER</option>
                <option value="ADMIN">ADMIN</option>
            </select>
        </div>

        <div class="form-item" style="justify-content:space-evenly">
        <input type="submit" class="btn very-bright" name="add" value="Ubah User">
        </div>
    </form>
</main>
<?= $this->endSection('content'); ?>