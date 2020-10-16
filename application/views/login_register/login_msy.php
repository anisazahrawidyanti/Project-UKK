<h1 class="card-title text-center mt-5">FORM LOGIN  MASYARAKAT</h1>
    <?php if($this->session->flashdata('gagal_login')){?>
        <div class="alert alert-danger" role="alert"><?php echo $this->session->flashdata('gagal_login');?></div>
    <?php } ?>
    <form action="<?php echo site_url('dashboard/aksi_login')?>" method="post" style=" width: 85%; margin-left: 40px">
        <div class="form-group row mt-5 mb-4">
            <label for="inputUsername" class="col-md-3 col-form-label">Username</label>
            <div class="col-md-9">
                <input type="text" class="form-control" style="border: none;border-bottom: 1px solid #CACACA; border-radius: 0;" name="username" placeholder="Masukan Username">
            </div>
        </div>
        <div class="form-group row mt-5 mb-4">
            <label for="inputPassword" class="col-md-3 col-form-label">Password</label>
            <div class="col-md-9">
                <input type="password" class="form-control form-password" style="border: none;border-bottom: 1px solid #CACACA; border-radius: 0" name="password" placeholder="Masukan Password">
            </div>
        </div>
        <div class="form-group row ">
            <div class="col-md-3"></div>
            <div class="col-md-9">
                <input type="checkbox" class="form-checkbox" id="form-checkbox" name="" > show password
            </div>
        </div>
        <div class="form-group mt-5 mb-4 text-center">
            <input type="submit" name="submit" class="btn btn-primary" value="Masuk">
            <a href="<?php echo site_url('Dashboard/index') ?>" class="btn btn-dark">Kembali</a>
        </div>
        <div class="form-group mt-5 text-center">
            <p>Belum punya akun? <a href="<?php echo site_url('Dashboard/registrasi_msy') ?>">Registrasi </a> &nbsp; || &nbsp; <a href="<?php echo site_url('Dashboard/login_adpet') ?>"> Masuk sebagai Admin/Petugas</a></p>
        </div>
        <hr>
        
    </form>

                          