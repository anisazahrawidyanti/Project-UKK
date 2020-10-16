<body>
    <div class="row">
        <div class="col-sm-12 mt-4">
            <h2 style="text-align: center">Data Masyarakat</h2>
            <br>
            <?php echo "Tanggal: ".date('d-m-Y'); ?>
            <br><br>
            <div class="table-responsive mb-4">
                <table id="example" border="1px" cellspacing="0" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                        <tr style="text-align: center">
                            <th scope="col">NIK</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Username</th>
                            <th scope="col">Password</th>
                            <th scope="col">No Telpon</th>
                            <th scope="col">Profil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($c_masyarakat){
                            foreach ($masyarakat as $datas){
                        ?>
                            <tr style="text-align: center">
                                <td class="text-center"><?php echo $datas->nik;?></td>
                                <td><?php echo $datas->nama;?></td>
                                <td><?php echo $datas->username;?></td>
                                <td><?php echo $datas->password;?></td>
                                <td><?php echo $datas->telp;?></td>
                                <td><img style="width: 100px" src="<?php echo base_url('assets/img/profil_masyarakat/'.$datas->image)?>" alt=""></td>
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