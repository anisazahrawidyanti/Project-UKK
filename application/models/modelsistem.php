<?php
Class modelsistem extends CI_Model{

    public function cek_login($table,$where){
        return $this->db->get_where($table,$where);
    }

    public function update_login($log_stat,$usernames){
        $this->db->set('status_login', $log_stat);
        $this->db->where('username', $usernames);
        $this->db->update('masyarakat');
    }

    public function update_log_adpet($update_log,$usernames){
        $this->db->set('stat_login', $update_log);
        $this->db->where('username', $usernames);
        $this->db->update('petugas');
    }

    public function simpan_msy(){
        $config['upload_path']   = './assets/img/profil_masyarakat';
        $config['allowed_types'] = 'jpg|png|gif';
        // $config['max_size']      = '204800';
        // $config['max_width']     = '1024';
        // $config['max_height']    = '758';
        $config['file_name']     = url_title($this->input->post('image'));
        $filename = $this->upload->file_name;
        $this->upload->initialize($config);
        $this->upload->do_upload('image');
        $data = $this->upload->data();

        $data = array(
            'nik'      => $this->input->post('nik'),
            'nama'     => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'telp'     => $this->input->post('telp'),
            'email'    => $this->input->post('email'),
            'image'    => $data['file_name']
        );
        $this->db->insert('masyarakat',$data);
        header("Location:".base_url().'dashboard/login_msy');
    }

    public function simpan_db(){
        $config['upload_path']   = './assets/img/profil_petugas';
        $config['allowed_types'] = 'jpg|png|gif';
        // $config['max_size']      = '204800';
        // $config['max_width']     = '1024';
        // $config['max_height']    = '758';
        $config['file_name']     = url_title($this->input->post('image'));
        $filename = $this->upload->file_name;
        $this->upload->initialize($config);
        $this->upload->do_upload('image');
        $data = $this->upload->data();

        $data = array(
            'id_petugas'   => $this->input->post('id_petugas'),
            'nama_petugas' => $this->input->post('nama_petugas'),
            'username'     => $this->input->post('username'),
            'password'     => $this->input->post('password'),
            'telp'         => $this->input->post('telp'),
            'email'        => $this->input->post('email'),
            'level'        => $this->input->post('level'),
            'image'        => $data['file_name']
        );
        $this->db->insert('petugas',$data);
        // header("Location:".base_url().'dashboard/registrasi_petugas');
    }

    //Hitung banyak data
    public function hitungJumlahPengaduan(){
        $query = $this->db->get('pengaduan');
        if ($query->num_rows()>0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function hitungJumlahPetugas(){
        $query = $this->db->get('petugas');
        if ($query->num_rows()>0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function hitungJumlahMasyarakat(){
        $query = $this->db->get('masyarakat');
        if ($query->num_rows()>0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    //AJAX

    //Data Petugas
    function ambilpetugas($table)
    {
        return $this->db->get($table);
    }
    
    function tambahpetugas($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function ambil_idpetugas($where,$table)
    {
        return $this->db->get_where($where,$table);
    }

    function updatepetugas($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function hapuspetugas($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    //Data Masyarakat
    function ambilmasyarakat($table)
    {
        return $this->db->get($table);
    }

    function hapusmasyarakat($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    //Data Tanggapan
    function ambiltanggapan($table)
    {
        return $this->db->get($table);
    }

    function ambil_idtanggapan($where,$table)
    {
        return $this->db->get_where($where,$table);
    }

    function updatetanggapan($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function hapustanggapan($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    //Data Pengaduan
    function ambilpengaduan($table)
    {
        return $this->db->get($table);
    }

    function ambil_idpengaduan($where,$table)
    {
        return $this->db->get_where($where,$table);
    }

    function tanggapiaduan($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function tambahaduan($data, $table)
    {
        $this->db->insert($table, $data);
    }
}

?>