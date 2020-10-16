<h3 class="card-title text-center mb-4">FORM REGISTER PETUGAS</h3>
    <form action="<?php echo site_url('dashboard/simpan_petugas'); ?>" method="post" enctype="multipart/form-data">
        <div class="form-group row ">
            <label class="col-md-4 col-form-label">Nama Petugas</label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="nama_petugas" placeholder="Masukan Nama">
            </div>
        </div>
        <div class="form-group row ">
            <label class="col-md-4 col-form-label">Username</label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="username" placeholder="Masukan Username">
            </div>
        </div>
        <div class="form-group row ">
            <label class="col-md-4 col-form-label">Password</label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="password" placeholder="Masukan Password">
            </div>
        </div>
        <div class="form-group row ">
            <label class="col-md-4 col-form-label">No Telpon</label>
            <div class="col-md-8">
                <input type="number" class="form-control" name="telp" placeholder="Masukan No Telpon">
            </div>
        </div>
        <div class="form-group row ">
            <label class="col-md-4 col-form-label">Email</label>
            <div class="col-md-8">
                <input type="text" class="form-control" name="email" placeholder="Masukan Email">
            </div>
        </div>
        <div class="form-group row ">
            <label class="col-md-4 col-form-label">Level</label>
            <div class="col-md-8">
                <select class="form-control" name="level">
                    <option value="">Pilih Level</option>
                    <option value="Admin">Admin</option>
                    <option value="Petugas">Petugas</option>
                </select>
            </div>
        </div>
        <div class="form-group row ">
            <label class="col-md-4 col-form-label">Gambar Profil</label>
            <div class="col-md-8">
                <input type="file" class="form-control-file" name="image">
            </div>
        </div>
        <div class="form-group text-center">
            <input type="submit" name="submit" class="btn btn-success mt-2 mb-3" value="Daftar">
        </div>
        <div class="form-group text-center">
            <p>Sudah punya akun? <a href="<?php echo site_url('Dashboard/login_adpet') ?>">Silahkan Login</a></p>
        </div>
    </form>

    