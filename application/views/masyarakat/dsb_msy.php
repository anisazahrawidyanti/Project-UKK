    <div class="col-md-10 p-4">
        <h3></i>Dashboard</h3><hr>
        <p class="blockquote">Selamat Datang di Aplikasi Laporan Pengaduan Masyarakat yang dibuat untuk melaporkan kejadian-kejadian yang ada pada masyarakat.</p>
        
        <div class="card shadow bg-light" style="width: 300px;">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-comments mr-3"></i>
                </div>
                <h5 class="card-title text-primary">Jumlah Pengaduan</h5>
                <div class="display-4 ml-5">
                    <?php echo $total_pengaduan; ?>
                </div>
                <a href="<?php echo site_url('Dashboard/laporan_msy'); ?>"><p class="card-text text-primary">Lihat Detail <i class="fas fa-angle-double-right ml-2 mt-3"></i></p></a>
            </div>
        </div>

    </div>
</div>