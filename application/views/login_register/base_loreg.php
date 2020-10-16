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
    <style>
        body{
            background : white;
            overflow: hidden;
        }
        .card{
            width: 100%; 
            height: 660px; 
            position: absolute; 
            top: 50%; 
            left: 50%; 
            transform: translate(-50%, -50%);
        }
        .card-img{
            width: 75%;
            height: 400px;
            margin-top: 100px;
            margin-left: 80px;
        }
        input text{
            background: none;
            outline:none;
            border: none;
            color: white;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="row no-gutters">
        <div class="col-md-6" style="background: #1543B3; height: 660px">
            <img src="<?php echo base_url().'assets/img/unnamed.png'; ?>" class="card-img" alt="...">
            <h1 class="text-white text-center mt-3">Pengaduan Masyarakat</h1>
        </div>
        <div class="col-md-6" style="background: none; height: 580px; margin-top: 35px">
            <div class="card-body" style="width: 90%; margin-left: 30px">
                <?php 
                    if ($this->uri->segment(2) == "login_msy") {
                        $this->load->view('login_register/login_msy');
                    }
                    else if($this->uri->segment(2) == "login_adpet"){
                        $this->load->view('login_register/login_adpet');
                    } 
                    else if($this->uri->segment(2) == "registrasi_msy"){
                        $this->load->view('login_register/registrasi_msy');
                    }
                    else if($this->uri->segment(2) == "registrasi_petugas"){
                        $this->load->view('login_register/registrasi_petugas');
                    }
                            
                ?>
            </div>
        </div>
    </div>
    
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <!-- Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.form-checkbox').click(function(){
                if ($(this).is(':checked')) {
                    $('.form-password').attr('type','text');
                } else {
                    $('.form-password').attr('type','password');
                }
            });
        });
    </script>
</body>
</html>