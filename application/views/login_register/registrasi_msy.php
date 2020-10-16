<h3 class="card-title text-center mb-4">FORM REGISTER</h3>
    <form action="<?php echo site_url('dashboard/simpan_masyarakat'); ?>" method="post" enctype="multipart/form-data">
        <div class="form-group row ">
            <label for="inputNik" class="col-md-3 col-form-label">NIK</label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="nik" placeholder="Masukan NIK">
            </div>
        </div>
        <div class="form-group row ">
            <label for="inputName" class="col-md-3 col-form-label">Nama</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="nama" placeholder="Masukan Nama">
                </div>
        </div>
        <div class="form-group row ">
            <label for="inputUsername" class="col-md-3 col-form-label">Username</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="username" placeholder="Masukan Username">
                </div>
        </div>
        <div class="form-group row ">
            <label for="inputPassword" class="col-md-3 col-form-label">Password</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="password" placeholder="Masukan Password">
                </div>
        </div>
        <div class="form-group row ">
            <label for="inputUsername" class="col-md-3 col-form-label">No Telpon</label>
            <div class="col-md-9">
                <input type="number" class="form-control" name="telp" placeholder="Masukan No Telpon">
            </div>
        </div>
        <div class="form-group row ">
            <label for="inputPassword" class="col-md-3 col-form-label">Email</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="email" placeholder="Masukan Email">
                </div>
        </div>
        <div class="form-group row ">
            <label for="inputUsername" class="col-md-3 col-form-label">Gambar Profil</label>
            <div class="col-md-9">
                <input type="file" class="form-control-file" name="image">
            </div>
        </div>
        <div class="form-group text-center">
            <input type="submit" name="submit" class="btn btn-success mt-2 mb-3" value="Daftar">
        </div>
        <div class="form-group text-center ">
            <p class="mt-3">Sudah punya akun? <a href="<?php echo site_url('Dashboard/login_msy') ?>">Silahkan Login</a></p>
        </div>
    </form>
    <!-- <br><br><br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <td>id petugas</td>
                <td>nama petugas</td>
                <td>username</td>
                <td>telpon</td>
                <td>password</td>
                <td>level</td>
                <td>button</td>
            </tr>
            <?php 
                if($c_petugas){
                    foreach ($petugas as $datas){
            ?>

            
            <tr>
                <td><?php echo $datas->id_petugas;?></td>
                <td><?php echo $datas->nama_petugas;?></td>
                <td><?php echo $datas->username;?></td>
                <td><?php echo $datas->telp;?></td>
                <td><?php echo $datas->password;?></td>
                <td><?php echo $datas->level;?></td>
                <td>
                    <div class="col-12">
                        <a href="<?php echo site_url('dashboard/edit_data/'.$datas->id_petugas);?>">
                            <button class="btn btn-success btn-sm edit_data" style="width:100%">Edit</button>
                        </a>
                    </div>
                    <div class="col-12 mt-2">
                        <a href="<?php echo site_url('dashboard/delete_data/'.$datas->id_petugas);?>">
                            <button class="btn btn-danger btn-sm hapus_data" style="width:100%">Delete</button>
                        </a>
                    </div>
                </td>
            </tr>
            <?php } }
                else {
                    ?>
                    <tr>
                        <td colspan="8">Data User Kosong!</td>
                    </tr>
                    <?php
                }
            ?>
        </thead>
    </table> -->