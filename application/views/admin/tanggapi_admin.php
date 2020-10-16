<h3></i>Tanggapan Pengaduan</h3><hr>
<div class="card shadow mt-4">
    <!-- <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div> -->
    <div class="card-body">
        <form class="ml-3 mr-3" action="<?php echo site_url('dashboard/aksi_tanggapi'); ?>" method="post" enctype="multipart/form-data">

            <?php foreach($data_tanggapi as $e): ?>
            
            <input type="hidden" name="id_pengaduan" value="<?php echo $e->id_pengaduan;?>"> 

            <div class="form-group mt-3">
                <label for="exampleInput">ID Pengaduan</label>
                <input type="text" class="form-control" value="<?php echo $e->id_pengaduan;?>" readonly>
            </div>
            <div class="form-group mt-3">
                <label for="exampleInput">Tanggal Tanggapan</label>
                <input type="date" class="form-control" name="tgl_tanggapan" value="<?php echo date('Y-m-d'); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Tulis Tanggapan</label>
                <textarea class="form-control" rows="3" name="isi_tanggapan"></textarea>
            </div>
            <div class="form-group mt-3">
                <label for="exampleInput">ID Petugas</label>
                <input type="text" class="form-control" name="id_petugas" value="<?php echo $this->session->userdata('id_petugas');?>" readonly>
            </div>
            <button type="submit" name="uploadBtn" value="Upload" class="btn btn-primary mt-3">Tanggapi</button>
            <a href="<?php echo site_url('Dashboard/lihat_laporan_adm'); ?>" class="btn btn-dark mt-3">Kembali</a>
                
            <?php endforeach; ?>

        </form>
    </div>
</div>