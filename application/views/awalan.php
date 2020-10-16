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
        <div class="row mt-2">
            <div class="col-md-6 mt-3">
                <h1 class="ml-5 text-white" style="font-family: ; font-size: 60px; margin-top: 100px;">Layanan <br> Pengaduan <br> Masyarakat</h1>
                <div class="row ml-5 mt-5">
                    <a href="<?php echo site_url('Dashboard/registrasi_msy') ?>"><button type="submit" class="btn btn-success mr-3">Daftar</button></a>
                    <a href="<?php echo site_url('Dashboard/login_msy') ?>"><button type="submit" class="btn btn-outline-light">Mulai Mengadu</button></a> 
                </div>  
            </div>
            <div class="col-md-6 mt-5">
            
                <center>
                    <img src="<?php echo base_url().'assets/img/ag-rupiah-2@2x.png' ?>" width="80%" style="margin-top: 60px" alt="">
                </center>
                    
            </div>
           
        </div>
    
</body>
</html>