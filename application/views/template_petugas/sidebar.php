<body>
    <div class="row">
        <div class="col-md-2">
            <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background: #2980B9">
                <a class="navbar-brand text-white text-center" href="#"><b>PENGADUAN MASYARAKAT</b></a>
            </nav>
        </div>
    </div>

    <div class="row no-gutters mt-5">
        <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
            <ul class="nav flex-column ml-3 mb-5">
                <li class="nav-item text-center">
                    <img src="<?php echo base_url().'assets/img/profil_petugas/'.$this->session->userdata('image'); ?>" style="width: 165px; height: 165px;" class="rounded-circle" alt="">
                    <p class="text-white mt-3" style="font-size: 18px"><b><?php echo $this->session->userdata('nama_petugas');?></b></p>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-white" href="<?php echo site_url('Dashboard/dsb_ptgs'); ?>"><i class="fas fa-tachometer-alt mr-2"></i> Dashboard</a><hr class="bg-secondary"> 
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?php echo site_url('Dashboard/lihat_laporan_ptgs'); ?>"><i class="fas fa-search mr-2"></i> Lihat Laporan</a><hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?php echo site_url('dashboard/logout_adpet'); ?>"><i class="fas fa-sign-out-alt mr-2"></i> Logout</a><hr class="bg-secondary">
                </li>
                <li class="nav-item mt-5">
                    <a class="text-white"></a>
                </li>
                <li class="nav-item mt-5">
                    <a class="text-white"></a>
                </li>
            </ul>
        </div>