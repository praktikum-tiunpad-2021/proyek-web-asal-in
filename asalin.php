<?php $title = "Login | SPPO" ?>

<?php require('shared/navbar.php') ?>
    <br>
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
        <span>Belum punya akun ? <a href="#">Daftar disini</a></span>
    </form><br><br>

    <!-- Buat Formulir pendaftaran-->
    <form>
        <!--No. Identitas-->
        <div class="form-group row">
          <label for="inputNoIdentitas" class="col-sm-2 col-form-label">No. Identitas</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputNoIdentitas"><br>
          </div>
        </div>

        <!--Password-->
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword3">
          </div>
        </div><br>
        
        <!--Jenis Kelamin-->
        <div class="row">
            <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
            <div class="col-sm-10">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="female" id="jkfemale" value="option1" checked>
                <label class="form-check-label" for="jkfemale">
                  Perempuan
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="male" id="jkmale" value="option2">
                <label class="form-check-label" for="jkmale">
                  Laki-laki
                </label>
              </div>
        </div>
        
        <!--Alamat-->
        <div class="form-group row">
            <label for="address" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  id="address" required>
            </div>
        </div><br><br>

        <!-- Status Perkawinan-->
        <div class="form-group row">
            <label for="status" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
              <select name="StatusKawin" id="StatusKawin" class="form-control">
                <option value="1">Belum Menikah</option>
                <option value="2">Menikah</option>
              </select>
            </div>
        </div><br><br>

        <!--Nama Institusi-->
        <div class="form-group row">
            <label for="institusi" class="col-sm-2 col-form-label">Nama Institusi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  id="institusi" required>
            </div>
        </div><br><br>        

        <!--No. Handphone-->
        <div class="form-group row">
            <label for="institusi" class="col-sm-2 col-form-label">No. Handphone</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  id="nohp" required>
            </div>
        </div><br><br> 

        <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
          </div>
    </form>    
<?php require('shared/footer.php') ?>