<?= $this->extend('/layout/base'); ?>

<?= $this->section('content'); ?>
<main class="container round-border">
    <div class="header-box bright">
        <h1>Formulir Pendaftaran Anggota</h1>
    </div>

    <form class="border" action="/signup" method="POST">
        <div class="form-item">
            <span><label for="name">Nama</label></span>
            <input type="text" id="name" name="name">
        </div>

        <div class="form-item">
            <span><label for="gender">Jenis Kelamin</label></span>
            <span>
                <input type="radio" name="jk" id="m" value="m" checked>
                <label for="m">Laki-laki</label>
            </span>
            <span>
                <input type="radio" name="jk" id="f" value="f">
                <label for="f">Perempuan</label>
            </span>
        </div>
        
        <div class="form-item">
            <span><label for="date_of_birth">Tanggal Lahir</label></span>
            <input type="date" id="date_of_birth" name="date_of_birth">
        </div>

        <div class="form-item">
            <span><label for="address">Alamat</label></span>
            <textarea id="address"></textarea>
        </div>
        
        <div class="form-item">
            <span><label for="status">Status</label></span>
            <select name="status" id="status">
                <option value="Pelajar">Pelajar</option>
                <option value="Mahasiswa">Mahasiswa</option>
                <option value="Umum">Umum</option>
                <option value="Peneliti">Peneliti</option>
                <option value="Karyawan">Karyawan</option>
            </select>
        </div>
        
        <div class="form-item">
            <span><label for="institution_name">Nama Institusi</label></span>
            <input type="text" id="institution_name" name="institution_name">
        </div>

        <div class="form-item">
            <span><label for="phone_number">Nomor Telepon</label></span>
            <input type="number" id="phone_number" name="phone_number">
        </div>

        <hr>

        <div class="form-item">
            <span><label for="email">Email</label></span>
            <input type="email" id="email" name="email">
        </div>

        <div class="form-item">
            <span><label for="password">Password</label></span>
            <input type="password" id="password" name="password">
        </div>

        <div class="form-item">
            <span><label for="password_repeat">Ulangi Password</label></span>
            <input type="password" id="password_repeat" name="password_repeat">
        </div>
        
        <div class="form-item" style="justify-content:space-evenly">
        <input type="submit" class="btn very-bright" name="login" value="Daftar">
        </div>
    </form>
</main>
<?= $this->endSection('content'); ?>