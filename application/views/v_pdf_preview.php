<body>
    <div class="row">
        <div class="col-sm-12 mt-4">
            <h2 style="text-align: center">Data Petugas</h2>
            <br>
            <?php echo "Tanggal: ".date('d-m-Y'); ?>
            <br><br>
            <div class="table-responsive mb-4">
                <table id="example" border="1px" cellspacing="0" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                        <tr style="text-align: center">
                            <td scope="col">ID Petugas</td>
                            <td scope="col">Nama Petugas</td>
                            <td scope="col">Username</td>
                            <td scope="col">Password</td>
                            <td scope="col">No Telpon</td>
                            <td scope="col">Email</td>
                            <td scope="col">Level</td>
                            <td scope="col">Profil</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($c_petugas){
                            foreach ($petugas as $datas){
                        ?>
                            <tr style="text-align: center">
                                <td><?php echo $datas->id_petugas;?></td>
                                <td><?php echo $datas->nama_petugas;?></td>
                                <td><?php echo $datas->username;?></td>
                                <td><?php echo $datas->password;?></td>
                                <td><?php echo $datas->telp;?></td>
                                <td><?php echo $datas->email;?></td>
                                <td><?php echo $datas->level;?></td>
                                <td><img style="width: 100px" src="<?php echo base_url('assets/img/profil_petugas/'.$datas->image)?>" alt=""></td>
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