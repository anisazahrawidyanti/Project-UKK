<h3></i>Tulis Pengaduan</h3><hr>
<div class="card shadow mb-4">
    <!-- <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div> -->
    <div class="card-body">
        <form class="ml-3 mr-3" action="<?php echo site_url('dashboard/simpan_pengaduan'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInput">Tanggal Pengaduan</label>
                <input type="date" class="form-control" name="tgl_pengaduan" value="<?php echo date('Y-m-d'); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="exampleInput">NIK</label>
                <input type="text" class="form-control" name="nik" value="<?php echo $this->session->userdata('nik');?>" required="" readonly>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Isi Laporan</label>
                <textarea class="form-control" name="isi_laporan" rows="3" required=""></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Unggah Foto</label>
                <input type="text" class="form-control" name="image">
                <small class="text-danger">*tipe yang bisa diupload adalah : .jpg, .jpeg, .png, .gif</small>
            </div>

            <button type="button" id="btn-tambah" onclick="tambahdata()" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

