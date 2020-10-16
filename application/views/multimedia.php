<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body style="overflow:hidden; background-color: #1543B3">
    
        <nav class="navbar navbar-light" style="background: white">
            <a class="navbar-brand" href="#"><h3 class="ml-2" style="color: #1543B3">ADUAN MASYARAKAT</h3></a>
            <a class="navbar-brand" href="<?php echo site_url('Dashboard/tmp_awal') ?>" style="margin-left: 720px; font-family: calibri">Beranda</a>
            <a class="navbar-brand" href="<?php echo site_url('Dashboard/multimed') ?>" style="font-family: calibri">Tonton Video</button></a> 
        </nav>
        <div class="row" style="margin-top: 140px">
            <div class="col-md-6" style="margin-top: 45px;">
                <h1 class="ml-5 text-white" style="font-size: 60px;">Video <br> Pengaduan <br> Masyarakat</h1>
            </div>
            <div class="col-md-6">
                <div class="text-center text-white">
                    <video width="80%" controls autoplay>
                        <source src="<?php echo base_url().'assets/video/Kenali Kanal-Kanal Pengaduan Cepat Respon Masyarakat Untuk Pengaduan Permasalahan di Jakarta.mp4'; ?>" type="video/mp4">
                    </video>
                </div>
                    
            </div>
           
        </div>
    
</body>
</html>