    <div class="col-md-10 p-4">
        <h3></i>DASHBOARD ADMIN</h3><hr>
            <p class="blockquote">Selamat Datang di Aplikasi Laporan Pengaduan Masyarakat yang dibuat untuk melaporkan kejadian-kejadian yang ada pada masyarakat.</p>

            <div class="row ml-4 mt-5">
                <div class="card shadow bg-light ml-5 border-left-primary" style="width: 275px; height: 180px">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-comments mr-2"></i>
                        </div>
                        <h5 class="card-title text-primary">Jumlah Pengaduan : </h5>
                        <div class="display-4 ml-5"><?php echo $total_pengaduan; ?></div>
                        <a href="<?php echo site_url('Dashboard/lihat_laporan_adm'); ?>"><p class="card-text text-blue">Lihat Detail <i class="fas fa-angle-double-right ml-2 mt-3"></i></p></a>
                    </div>
                </div>
                <div class="card shadow bg-light ml-5" style="width: 275px; height: 180px">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-user-tie mr-2"></i>
                        </div>
                        <h5 class="card-title text-primary">Jumlah Petugas : </h5>
                        <div class="display-4 ml-5"><?php echo $total_petugas; ?></div>
                        <a href="<?php echo site_url('Dashboard/data_petugas'); ?>"><p class="card-text text-blue">Lihat Detail <i class="fas  fa-angle-double-right ml-2 mt-3"></i></p></a>
                    </div>
                </div>
            
                <div class="card shadow bg-light ml-5" style="width: 275px; height: 180px">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-users mr-2"></i>
                        </div>
                        <h5 class="card-title text-primary">Jumlah Masyarakat : </h5>
                        <div class="display-4 ml-5"><?php echo $total_masyarakat; ?></div>
                        <a href="<?php echo site_url('Dashboard/data_masyarakat'); ?>"><p class="card-text text-blue">Lihat Detail <i class="fas fa-angle-double-right ml-2 mt-3"></i></p></a>
                    </div>
                </div>
            </div>
    </div>
</div>