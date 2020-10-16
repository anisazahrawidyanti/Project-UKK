<h3></i>Data Pengaduan</h3><hr>
    <table class="table table-bordered ">
        <thead>
            <tr class="text-center">
                <th scope="col">ID</th>
                <th scope="col">Tanggal</th>
                <th scope="col">NIK</th>
                <th scope="col">Isi Laporan</th>
                <th scope="col">Foto</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if($c_pengaduan){
                    foreach ($pengaduan as $datas){
            ?>

            <tr>
                <td><?php echo $datas->id_pengaduan;?></td>
                <td><?php echo $datas->tgl_pengaduan;?></td>
                <td><?php echo $datas->nik;?></td>
                <td><?php echo $datas->isi_laporan;?></td>
                <td><img style="width: 100px" src="<?php echo base_url('assets/img/'.$datas->image)?>" alt=""></td>
                <td><?php echo $datas->status;?></td>
                <td>
                    <a href="<?php echo site_url('Dashboard/verifikasi') ?>" class="btn btn-info btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text"> Verifikasi</span>
                    </a>
                    <a href="<?php echo site_url('Dashboard/tanggapi_admin') ?>" class="btn btn-danger btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-edit"></i>
                        </span>
                        <span class="text">Tanggapi</span>
                    </a>
                </td>
            </tr>
            <?php } }
                else {
                    ?>
                    <tr>
                        <td colspan="8">Data pengaduan Kosong!</td>
                    </tr>
                    <?php
                }
            ?>
                </tbody>
            </table>