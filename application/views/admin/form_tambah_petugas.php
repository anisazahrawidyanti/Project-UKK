<h3></i>Tambah Petugas</h3><hr>
    <form class="ml-3 mt-3 mr-3" action="<?php echo site_url('dashboard/tambah_petugas'); ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInput">Nama Petugas</label>
            <input type="text" class="form-control" name="nama_petugas" required="">
        </div>
        <div class="form-group">
            <label for="exampleInput">Username</label>
            <input type="text" class="form-control" name="username" required="">
        </div>
        <div class="form-group">
            <label for="exampleInput">Password</label>
            <input type="text" class="form-control" name="password" required="">
        </div>
        <div class="form-group">
            <label for="exampleInput">No Telpon</label>
            <input type="number" class="form-control" name="telp" required="">
        </div>
        <div class="form-group">
            <label for="exampleInput">Email</label>
            <input type="text" class="form-control" name="email" required="">
        </div>
        <div class="form-group">
            <label for="inputUsername">Level</label>
            <select class="form-control" name="level">
                <option value="">Pilih Level</option>
                <option value="Admin">Admin</option>
                <option value="Petugas">Petugas</option>
            </select>
        </div>
        <div class="form-group">
            <label>Gambar Profil</label>
            <input type="file" class="form-control-file mt-2" name="image">
        </div>
        <div class="form-group">
            <div class="row">
                <button type="submit" name="submit" value="Upload" class="btn btn-primary mt-5 ml-3">Simpan</button>
                <button type="submit" name="uploadBtn" value="" class="btn btn-warning mt-5 ml-2 text-white">Kosongkan</button>
                <a href="<?php echo site_url('Dashboard/data_petugas') ?>" class="btn btn-dark mt-5 ml-2">Kembali</a>
            </div>
        </div>      
    </form>