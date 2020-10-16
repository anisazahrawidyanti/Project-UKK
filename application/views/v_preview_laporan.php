<body>
    <div class="row">
        <div class="col-sm-12 mt-4">
            <h2 style="text-align: center">Data Aduan Masyarakat</h2>
            <?php echo "Tanggal: ".date('d-m-Y'); ?>
            <br><br>
            <div class="table-responsive mb-4">
                <table id="example" border="1px" cellspacing="0" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                        <tr style="text-align: center">
                            <th scope="col">ID</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Isi Laporan</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($c_pengaduan){
                            foreach ($pengaduan as $datas){
                        ?>
                            <tr style="text-align: center">
                                <td><?php echo $datas->id_pengaduan;?></td>
                                <td><?php echo $datas->tgl_pengaduan;?></td>
                                <td><?php echo $datas->nik;?></td>
                                <td><?php echo $datas->isi_laporan;?></td>
                                <td><img style="width: 100px" src="<?php echo base_url('assets/img/foto_pengaduan/'.$datas->image)?>" alt=""></td>
                                <td><?php echo $datas->status;?></td>
                            </tr>
                        <?php } }
                            else {
                                ?>
                                <!-- <tr>
                                    <td colspan="8">Data User Kosong!</td>
                                </tr> -->
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>