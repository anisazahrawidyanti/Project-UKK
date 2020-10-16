<h3></i>Tanggapan Pengaduan</h3><hr>
    <a href="<?php echo site_url('Dashboard/lihat_laporan_ptgs'); ?>" class="btn btn-dark">Kembali</a>
    <form class="ml-3 mr-3">
       

        <div class="form-group mt-3">
            <label for="exampleInput">ID Pengaduan</label>
            <input type="text" class="form-control" >
        </div>
        <div class="form-group mt-3">
            <label for="exampleInput">Tanggal Pengaduan</label>
            <input type="text" class="form-control" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Tulis Tanggapan</label>
            <textarea class="form-control" rows="3"></textarea>
        </div>
        <div class="form-group mt-3">
            <label for="exampleInput">ID Petugas</label>
            <input type="text" class="form-control" >
        </div>
        <button type="submit" name="uploadBtn" value="Upload" class="btn btn-primary mt-3">Tanggapi</button>
     
    </form>