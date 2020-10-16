<h3></i>Form Edit Petugas</h3><hr>
    <form action="<?php echo site_url('dashboard/aksi_edit'); ?>" method="post" enctype="multipart/form-data">

        <?php foreach($data_edit as $e): ?>
        
        <input type="hidden" name="id_petugas" value="<?php echo $e->id_petugas;?>"> 
        
        <div class="form-group mt-3">
            <label for="inputUsername">ID Petugas</label>
            <input type="text" class="form-control" name="id_petugas" value="<?php echo $e->id_petugas;?>" disabled>    
        </div>
        <div class="form-group">
            <label for="inputUsername">Nama Petugas</label>
            <input type="text" class="form-control" name="nama_petugas" value="<?php echo $e->nama_petugas;?>" placeholder="Masukan Nama">
        </div>
        <div class="form-group ">
            <label for="inputUsername">Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo $e->username;?>" placeholder="Masukan Username">
        </div>
        <div class="form-group">
            <label for="inputUsername">Password</label>
            <input type="text" class="form-control" name="password" value="<?php echo $e->password;?>" placeholder="Masukan Password">
        </div>
        <div class="form-group">
            <label for="inputUsername">No Telpon</label>
            <input type="text" class="form-control" name="telp" value="<?php echo $e->telp;?>" placeholder="Masukan No Telpon">
        </div>
        <div class="form-group">
            <label for="inputUsername">Email</label>
            <input type="text" class="form-control" name="email" value="<?php echo $e->email;?>" placeholder="Masukan Email">
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
                <!-- <input type="submit" name="submit" class="btn btn-success" value="Edit"> -->
                <button type="submit" name="submit" value="Edit" class="btn btn-primary mt-2 ml-3">Edit</button>
                <button type="submit" name="uploadBtn" value="" class="btn btn-warning mt-2 ml-2 text-white">Kosongkan</button>
                <a href="<?php echo site_url('Dashboard/data_petugas') ?>" class="btn btn-dark mt-2 ml-2">Kembali</a>
            </div>
        </div>   
<?php endforeach; ?>
    </form>