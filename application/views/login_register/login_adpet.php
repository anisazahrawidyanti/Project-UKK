<h1 class="card-title text-center mt-5">FORM LOGIN <br> ADMIN/PETUGAS</h1>
    <?php if($this->session->flashdata('gagal_login')){?>
        <div class="alert alert-danger" role="alert"><?php echo $this->session->flashdata('gagal_login');?></div>
    <?php } ?>
    <form action="<?php echo site_url('dashboard/aksi_login_adpet')?>" method="post" style=" width: 85%; margin-left: 40px">
        <div class="form-group row mt-5 mb-5">
            <label for="inputUsername" class="col-md-3 col-form-label">Username</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" style="border: none;border-bottom: 1px solid #CACACA; border-radius: 0;" name="username" placeholder="Masukan Username">
                </div>
        </div>
        <div class="form-group row mt-5 mb-4">
            <label for="inputPassword" class="col-md-3 col-form-label">Password</label>
                <div class="col-md-9">
                    <input type="password" class="form-control form-password" id="form-password" style="border: none;border-bottom: 1px solid #CACACA;" name="password" placeholder="Masukan Password">
                </div>
        </div>
        <div class="form-group row ">
            <div class="col-md-3"></div>
            <div class="col-md-9">
                <input type="checkbox" class="form-checkbox" id="form-checkbox" name="" > show password
            </div>
        </div>
        <div class="form-group mt-5 text-center">
            <input type="submit" name="submit" class="btn btn-primary" value="Masuk">
            <a href="<?php echo site_url('Dashboard/registrasi_petugas') ?>" class="btn btn-success ml-2">Registrasi</a>
        </div>
        <div class="form-group mt-5" style="margin-left: 230px">
            <a href="<?php echo site_url('Dashboard/login_msy') ?>"><-Kembali</a>
        </div>
    </form>