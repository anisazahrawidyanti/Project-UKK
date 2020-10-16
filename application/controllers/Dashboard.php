<?php
    Class Dashboard extends CI_Controller{
        
        //Tampilan awal
        public function tmp_awal(){
            $data['title'] = "index";
            $this->load->view('awalan', $data);
        }

        public function index(){
            // $data['title'] = "index";
            // $this->load->view('awalan', $data);
            if ($this->session->userdata('status_login') != 'Online') {
                redirect('dashboard/tmp_awal');
            } else if($this->session->userdata('status_login') == 'Online'){
                redirect('dashboard/dsb_msy/'.$this->session->userdata('username'));
            }
        }

        public function adm(){
            if ($this->session->userdata('stat_login') == 'Online' && $this->session->userdata('level') == 'admin') {
                redirect('dashboard/dsb_adm/'.$this->session->userdata('username'));
            } else if ($this->session->userdata('stat_login') == 'Online' && $this->session->userdata('level') == 'petugas') {
                redirect('dashboard/dsb_ptgs/'.$this->session->userdata('username'));
            } else if ($this->session->userdata('stat_login') != 'Online') {
                redirect('dashboard/login_adpet');
            }
        }

        //Tampilan video
        public function multimed(){
            $data['title'] = "Video";
            $this->load->view('multimedia', $data);
        }

        //Tampilan login masyarakat dan aksi login
        public function login_msy(){
            // $data['title'] = "Login Masyarakat";
            // $this->load->view('base_loreg', $data);
            if ($this->session->userdata('status_login') == 'Online') {
                redirect('dashboard/dsb_msy/'.$this->session->userdata('username'));
            }
            $data['title'] = "Login";
            $this->load->view('login_register/base_loreg',$data);
        }

        public function aksi_login(){
            $usernames = $this->input->post('username');
            $passwords = $this->input->post('password');

            $where = array(
                'username' => $usernames,
                'password' => $passwords
            );
            $cek = $this->modelsistem->cek_login("masyarakat",$where)->num_rows();

            if($cek > 0){
                $log_stat = 'Online';
                $this->modelsistem->update_login($log_stat, $usernames);
                $data = $this->modelsistem->cek_login('masyarakat',$where)->result();

                foreach ($data as $dataz) {
                    $data_session = array(
                        'nik' => $dataz->nik,
                        'nama' => $dataz->nama,
                        'username' => $dataz->username,
                        'password' => $dataz->password,
                        'telp' => $dataz->telp,
                        'image' => $dataz->image,
                        'status_login' => $dataz->status_login
                    );
                }

                $this->session->set_userdata($data_session);

                if ($this->session->userdata('status_login') == 'Online'){
                    header("Location:".base_url().'dashboard/dsb_msy/'.$this->session->userdata('username'));
                } else {
                    echo "Login gagal";
                }
            } else {
                // echo "Username dan password salah!";
                $this->session->set_flashdata('gagal_login', 'Username dan password salah! Coba masukan dengan benar!');
                redirect('dashboard/login_msy');
            }
        }

        //Tampilan login petugas dan aksi login petugas
        public function login_adpet(){
            if ($this->session->userdata('stat_login') == 'Online'  && $this->session->userdata('level') == 'admin') {
                redirect('dashboard/dsb_adm');
            } else if ($this->session->userdata('stat_login') == 'Online'  && $this->session->userdata('level') == 'petugas') {
                redirect('dashboard/dsb_ptgs');
            } 
            $data['title'] = "Login Admin & Petugas";
            $this->load->view('login_register/base_loreg', $data);
        }

        public function aksi_login_adpet(){
            $usernames = $this->input->post('username');
            $passwords = $this->input->post('password');

            $where = array(
                'username' => $usernames,
                'password' => $passwords
            );
            $cek = $this->modelsistem->cek_login("petugas",$where)->num_rows();

            if($cek > 0){
                $update_log = 'Online';
                $this->modelsistem->update_log_adpet($update_log, $usernames);

                $data = $this->modelsistem->cek_login('petugas',$where)->result();

                foreach ($data as $dataz) {
                    $data_session = array(
                        'id_petugas' => $dataz->id_petugas,
                        'nama_petugas' => $dataz->nama_petugas,
                        'username' => $dataz->username,
                        'password' => $dataz->password,
                        'telp' => $dataz->telp,
                        'level' => $dataz->level,
                        'image' => $dataz->image,
                        'stat_login' => $dataz->stat_login
                    );
                }

                $this->session->set_userdata($data_session);

                if ($this->session->userdata('stat_login') == 'Online'){
                    redirect('dashboard/adm');
                } 
                else {
                    echo "Login gagal";
                }
            } else {
                $this->session->set_flashdata('gagal_login', 'Username dan password salah! Coba masukan dengan benar!');
                redirect('dashboard/adm');
            }
        }

        //Tampilan regis masyarakat dan simpan masyarakat
        public function registrasi_msy(){
            $data['title'] = "Registrasi Masyarakat";
            // $data['petugas'] = $this->modelsistem->get_petugas();
            // $data['c_petugas'] = $this->modelsistem->count_petugas();
            $this->load->view('login_register/base_loreg', $data);
        }

        public function simpan_masyarakat(){
            $this->modelsistem->simpan_msy();
        }

        //Tampilan regis petugas dan simpan petugas
        public function registrasi_petugas(){
            $data['title'] = "Registrasi Petugas";
            $this->load->view('login_register/base_loreg',$data);
        }
        
        public function simpan_petugas(){
            $this->modelsistem->simpan_db();
            header("Location:".base_url().'dashboard/login_adpet');
        }

        //Tampilan masyarakat
        public function dsb_msy(){

            $data['title'] = "Dashboard";
            $data['total_pengaduan'] = $this->modelsistem->hitungJumlahPengaduan();
            $this->load->view('template_masyarakat/header', $data);
            $this->load->view('template_masyarakat/sidebar');
            $this->load->view('masyarakat/dsb_msy', $data);
            $this->load->view('template_masyarakat/footer');
        }

        public function laporan_msy(){
            $data['title'] = "Data Pengaduan";
            $data['pengaduan'] = $this->modelsistem->get_pengaduan();
            $data['c_pengaduan'] = $this->modelsistem->count_pengaduan();
            $this->load->view('template_masyarakat/header', $data);
            $this->load->view('template_masyarakat/sidebar');
            $this->load->view('masyarakat/laporan_msy', $data);
            $this->load->view('template_masyarakat/footer');
        }

        public function lihat_tanggapan_msy(){
            $data['title'] = "Lihat Tanggapan";
            $this->load->view('template_masyarakat/header', $data);
            $this->load->view('template_masyarakat/sidebar');
            $this->load->view('masyarakat/lihat_tanggapan_msy', $data);
            $this->load->view('template_masyarakat/footer');
        }
        
        public function logout(){
            // $this->session->sess_destroy();
            // redirect(base_url('dashboard/login_msy'));
            $log_stat = 'Offline';
            $usernames = $this->session->userdata('username');
            $this->modelsistem->update_login($log_stat,$usernames);
            $this->session->sess_destroy();
            redirect(base_url('dashboard/login_msy'));
        }

        //Tampilan admin
        public function dsb_adm(){
            // if ($this->session->userdata('stat_login') != 'Online') {
            //     redirect('dashboard/login_adpet');
            // }
            $data['title'] = "Dashboard";
            $data['total_pengaduan'] = $this->modelsistem->hitungJumlahPengaduan();
            $data['total_petugas'] = $this->modelsistem->hitungJumlahPetugas();
            $data['total_masyarakat'] = $this->modelsistem->hitungJumlahMasyarakat();
            $this->load->view('template_admin/header', $data);
            $this->load->view('template_admin/sidebar');
            $this->load->view('admin/dsb_admin', $data);
            $this->load->view('template_admin/footer');
        } 
        public function lihat_laporan_adm(){
            $data['title'] = "Lihat Laporan";
            $this->load->view('template_admin/header', $data);
            $this->load->view('template_admin/sidebar');
            $this->load->view('admin/lihat_laporan_adm', $data);
            $this->load->view('template_admin/footer');
        } 
      
        public function data_petugas(){
            $data['title'] = "Data Petugas";
            $this->load->view('template_admin/header', $data);
            $this->load->view('template_admin/sidebar');
            $this->load->view('admin/data_petugas', $data);
            $this->load->view('template_admin/footer');
        } 
        
        public function data_masyarakat(){
            $data['title'] = "Data Masyarakat";
            $this->load->view('template_admin/header', $data);
            $this->load->view('template_admin/sidebar');
            $this->load->view('admin/data_masyarakat', $data);
            $this->load->view('template_admin/footer');
        }
        
        public function data_tanggapan(){
            $data['title'] = "Data Tanggapan";
            $this->load->view('template_admin/header', $data);
            $this->load->view('template_admin/sidebar');
            $this->load->view('admin/data_tanggapan', $data);
            $this->load->view('template_admin/footer');
        }

        //Tampil petugas
        public function dsb_ptgs(){
            $data['title'] = "Dashboard";
            $data['total_pengaduan'] = $this->modelsistem->hitungJumlahPengaduan();
            $this->load->view('template_petugas/header', $data);
            $this->load->view('template_petugas/sidebar');
            $this->load->view('petugas/dsb_petugas', $data);
            $this->load->view('template_petugas/header');
        }       
        
        public function lihat_laporan_ptgs(){
            $data['title'] = "Lihat Laporan";
            $data['pengaduan'] = $this->modelsistem->get_pengaduan();
            $data['c_pengaduan'] = $this->modelsistem->count_pengaduan();
            $this->load->view('template_petugas/header', $data);
            $this->load->view('template_petugas/sidebar');
            $this->load->view('petugas/lihat_laporan_petugas', $data);
            $this->load->view('template_petugas/header');
        }
        public function logout_adpet(){
            // $this->session->sess_destroy();
            // redirect(base_url('dashboard/login_msy'));
            $update_log = 'Offline';
            $usernames = $this->session->userdata('username');
            $this->modelsistem->update_log_adpet($update_log,$usernames);
            $this->session->sess_destroy();
            redirect(base_url('dashboard/login_adpet'));

        }

        //preview
        public function cek_masyarakat(){
            $data['title'] = "Data Masyarakat";
            $data['masyarakat'] = $this->modelsistem->get_masyarakat();
            $data['c_masyarakat'] = $this->modelsistem->count_masyarakat();
            $this->load->view('v_cek', $data);
        }

        //cetak data petugas
        public function cetak_pdf_petugas(){
            ob_start();
            $data['c_petugas'] = $this->modelsistem->count_petugas();
            $data['petugas'] = $this->modelsistem->get_petugas();
            $this->load->view('v_pdf_preview',$data);
            $html = ob_get_contents();
                    ob_end_clean();

            require './assets/html2pdf/autoload.php';

            $pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');
            $pdf->WriteHTML($html);
            $pdf->Output('Data_Petugas_'.date('d-m-Y'). '.pdf', 'D');
        }

        public function cetak_xls_petugas(){
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="Data Petugas.xls"');
            header('Cache-Control: max-age=0');
            $data['c_petugas'] = $this->modelsistem->count_petugas();
            $data['petugas'] = $this->modelsistem->get_petugas();
            $this->load->view('v_pdf_preview', $data);
        }

        //cetak data masyarakat 
        public function cetak_pdf_masyarakat(){
            ob_start();
            $data['c_masyarakat'] = $this->modelsistem->count_masyarakat();
            $data['masyarakat'] = $this->modelsistem->get_masyarakat();
            $this->load->view('v_preview_masyarakat',$data);
            $html = ob_get_contents();
                    ob_end_clean();

            require './assets/html2pdf/autoload.php';

            $pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');
            $pdf->WriteHTML($html);
            $pdf->Output('Data_masyarakat_'.date('d-m-Y'). '.pdf', 'D');
        }

        public function cetak_xls_masyarakat(){
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="Data masyarakat.xls"');
            header('Cache-Control: max-age=0');
            $data['c_masyarakat'] = $this->modelsistem->count_masyarakat();
            $data['masyarakat'] = $this->modelsistem->get_masyarakat();
            $this->load->view('v_preview_masyarakat', $data);
        }

        //cetak data pengaduan
        public function cetak_pdf_pengaduan(){
            ob_start();
            $data['c_pengaduan'] = $this->modelsistem->count_pengaduan();
            $data['pengaduan'] = $this->modelsistem->get_pengaduan();
            $this->load->view('v_preview_laporan',$data);
            $html = ob_get_contents();
                    ob_end_clean();

            require './assets/html2pdf/autoload.php';

            $pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');
            $pdf->WriteHTML($html);
            $pdf->Output('Data_Pengaduan_'.date('d-m-Y'). '.pdf', 'D');
        }

        public function cetak_xls_pengaduan(){
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="Data Pengaduan.xls"');
            header('Cache-Control: max-age=0');
            $data['c_pengaduan'] = $this->modelsistem->count_pengaduan();
            $data['pengaduan'] = $this->modelsistem->get_pengaduan();
            $this->load->view('v_preview_laporan', $data);
        }

        //AJAX

        //Data Petugas
        public function ambildataPetugas()
        {
            $dataPetugas = $this->modelsistem->ambilpetugas('petugas')->result();
            echo json_encode($dataPetugas);
        }

        public function tambahdataPetugas()
        {
            // $config['upload_path']   = './assets/img/profil_petugas';
            // $config['allowed_types'] = 'jpg|png|gif';
            // $config['file_name']     = url_title($this->input->post('image'));
            // $filename = $this->upload->file_name;
            // $this->upload->initialize($config);
            // $this->upload->do_upload('image');
            // $data = $this->upload->data();

            $nama_petugas = $this->input->post('nama_petugas');
            $username     = $this->input->post('username');
            $password     = $this->input->post('password');
            $telp         = $this->input->post('telp');
            $email        = $this->input->post('email');
            $level        = $this->input->post('level');
            $image        = $this->input->post('image');

            if ($nama_petugas == '') {
                $result['pesan'] = "Nama Petugas harus diisi";
            } else if ($username == '') {
                $result['pesan'] = "Username harus diisi";
            } else if ($password == '') {
                $result['pesan'] = "Password harus diisi";
            } else if ($telp == '') {
                $result['pesan'] = "No Telpon harus diisi";
            } else if ($email == '') {
                $result['pesan'] = "Email harus diisi";
            } else if ($level == '') {
                $result['pesan'] = "Level harus diisi";
            } else if ($image == '') {
                $result['pesan'] = "Image harus diisi";
            } else {
                $result['pesan'] = "";

                $data = array(
                    'nama_petugas' => $nama_petugas,
                    'username'     => $username,
                    'password'     => $password,
                    'telp'         => $telp,
                    'email'        => $email,
                    'level'        => $level,
                    'image'        => $image
                );

                $this->modelsistem->tambahpetugas($data, 'petugas');
            }
            echo json_encode($result);
        }

        public function ambil_IdPetugas()
        {
            $id_petugas = $this->input->post('id_petugas');
            $where = array('id_petugas' => $id_petugas);
            $datapetugas = $this->modelsistem->ambil_idpetugas('petugas',$where)->result();
    
            echo json_encode($datapetugas);
        }
    
        public function ubahdataPetugas()
        {
            $id_petugas   = $this->input->post('id_petugas');
            $nama_petugas = $this->input->post('nama_petugas');
            $username     = $this->input->post('username');
            $password     = $this->input->post('password');
            $telp         = $this->input->post('telp');
            $email        = $this->input->post('email');
            $level        = $this->input->post('level');
            $image        = $this->input->post('image');
    
            if ($nama_petugas == '') {
                $result['pesan'] = "Nama Petugas harus diisi";
            } else if ($username == '') {
                $result['pesan'] = "Username harus diisi";
            } else if ($password == '') {
                $result['pesan'] = "Password harus diisi";
            } else if ($telp == '') {
                $result['pesan'] = "No Telpon harus diisi";
            } else if ($email == '') {
                $result['pesan'] = "Email harus diisi";
            } else if ($level == '') {
                $result['pesan'] = "Level harus diisi";
            } else if ($image == '') {
                $result['pesan'] = "Image harus diisi";
            } else {
                $result['pesan'] = "";
    
                $where = array('id_petugas' => $id_petugas);
    
                $data = array(
                    
                    'nama_petugas' => $nama_petugas,
                    'username'     => $username,
                    'password'     => $password,
                    'telp'         => $telp,
                    'email'        => $email,
                    'level'        => $level,
                    'image'        => $image
                );
                $this->modelsistem->updatepetugas($where, $data, 'petugas');
            }
            echo json_encode($result);
        }

        public function hapusdataPetugas()
        {
            $id_petugas = $this->input->post('id_petugas');
            $where = array('id_petugas' => $id_petugas);
            $this->modelsistem->hapuspetugas($where, 'petugas');
        }

        //Data Masyarakat
        public function ambildataMasyarakat()
        {
            $dataMasyarakat = $this->modelsistem->ambilmasyarakat('masyarakat')->result();
            echo json_encode($dataMasyarakat);
        }

        public function hapusdata_Masyarakat()
        {
            $nik = $this->input->post('nik');
            $where = array('nik' => $nik);
            $this->modelsistem->hapusmasyarakat($where, 'masyarakat');
        }

        //Data Tanggapan
        public function ambildataTanggapan()
        {
            $dataTanggapan = $this->modelsistem->ambiltanggapan('tanggapan')->result();
            echo json_encode($dataTanggapan);
        }

        public function ambil_idTanggapan()
        {
            $id_tanggapan = $this->input->post('id_tanggapan');
            $where = array('id_tanggapan' => $id_tanggapan);
            $dataTanggapan = $this->modelsistem->ambil_idtanggapan('tanggapan',$where)->result();
    
            echo json_encode($dataTanggapan);
        }

        public function ubahdataTanggapan()
        {
            $id_tanggapan  = $this->input->post('id_tanggapan');
            $id_pengaduan  = $this->input->post('id_pengaduan');
            $tgl_tanggapan = $this->input->post('tgl_tanggapan');
            $tanggapan     = $this->input->post('tanggapan');
            $id_petugas    = $this->input->post('id_petugas');
    
            if ($id_tanggapan == '') {
                $result['pesan'] = "ID tanggapan harus diisi";
            } else if ($id_pengaduan == '') {
                $result['pesan'] = "ID Pengaduan harus diisi";
            } else if ($tgl_tanggapan == '') {
                $result['pesan'] = "Tanggal tanggapan harus diisi";
            } else if ($tanggapan == '') {
                $result['pesan'] = "Isi Tanggapan harus diisi";
            } else if ($id_petugas == '') {
                $result['pesan'] = "ID Petugas harus diisi";
            } else {
                $result['pesan'] = "";
    
                $where = array('id_tanggapan' => $id_tanggapan);
    
                $data = array(
                    
                    'id_tanggapan'  => $id_tanggapan,
                    'id_pengaduan'  => $id_pengaduan,
                    'tgl_tanggapan' => $tgl_tanggapan,
                    'tanggapan'     => $tanggapan,
                    'id_petugas'    => $id_petugas
                );
                $this->modelsistem->updatetanggapan($where, $data, 'tanggapan');
            }
            echo json_encode($result);
        }

        public function hapusdataTanggapan()
        {
            $id_tanggapan = $this->input->post('id_tanggapan');
            $where = array('id_tanggapan' => $id_tanggapan);
            $this->modelsistem->hapustanggapan($where, 'tanggapan');
        }

        //Data Pengaduan
        public function ambildataPengaduan()
        {
            $dataPengaduan = $this->modelsistem->ambilpengaduan('pengaduan')->result();
            echo json_encode($dataPengaduan);
        }

        public function ambil_idPengaduan()
        {
            $id_pengaduan = $this->input->post('id_pengaduan');
            $where = array('id_pengaduan' => $id_pengaduan);
            $dataPengaduan = $this->modelsistem->ambil_idpengaduan('pengaduan',$where)->result();
    
            echo json_encode($dataPengaduan);
        }

        public function tanggapi_pengaduan()
        {
            $id_pengaduan  = $this->input->post('id_pengaduan');
            $tgl_tanggapan = $this->input->post('tgl_tanggapan');
            $tanggapan     = $this->input->post('tanggapan');
            $id_petugas    = $this->input->post('id_petugas');
           
            if ($id_pengaduan == '') {
                $result['pesan'] = "Nama Petugas harus diisi";
            } else if ($tgl_tanggapan == '') {
                $result['pesan'] = "Tanggal Tanggapan harus diisi";
            } else if ($tanggapan == '') {
                $result['pesan'] = "Tanggapan harus diisi";
            } else if ($id_petugas == '') {
                $result['pesan'] = "No Telpon harus diisi";
            } else {
                $result['pesan'] = "";

                $data = array(
                    'id_pengaduan'  => $id_pengaduan,
                    'tgl_tanggapan' => $tgl_tanggapan,
                    'tanggapan'     => $tanggapan,
                    'id_petugas'    => $id_petugas
                );

                $this->modelsistem->tanggapiaduan($data, 'tanggapan');
            }
            echo json_encode($result);
        }

        public function tambahdataPengaduan()
        {
            $tgl_pengaduan  = $this->input->post('tgl_pengaduan');
            $nik            = $this->input->post('nik');
            $isi_laporan    = $this->input->post('isi_laporan');
            $image          = $this->input->post('image');
           
            if ($tgl_pengaduan == '') {
                $result['pesan'] = "Tanggal Pengaduan harus diisi";
            } else if ($nik == '') {
                $result['pesan'] = "NIK harus diisi";
            } else if ($isi_laporan == '') {
                $result['pesan'] = "Isi laporan harus diisi";
            } else if ($image == '') {
                $result['pesan'] = "Gambar harus diisi";
            } else {
                $result['pesan'] = "";

                $data = array(
                    'tgl_pengaduan' => $tgl_pengaduan,
                    'nik'           => $nik,
                    'isi_laporan'   => $isi_laporan,
                    'image'         => $image,
                    'status'        => "0"
                );

                $this->modelsistem->tambahaduan($data, 'pengaduan');
              
            }
            echo json_encode($result);
        }

        public function __construct(){
            parent::__construct();
            $this->load->model('modelsistem');
            $this->load->helper('form');
            $this->load->helper('url');
        }
    }
?>