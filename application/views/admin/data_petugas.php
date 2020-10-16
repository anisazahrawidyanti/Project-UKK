    <div class="col-md-10 p-4">
        <h3></i>Data Petugas</h3><hr>
        <div class="card shadow mt-4">
            <!-- <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div> -->
            <div class="card-body">
                <div class="row mt-2 ml-1 mb-4">
                    <a href="#form" data-toggle="modal" class="btn btn-primary mr-3 mt-2" onclick="submit('tambah')" style="height: 40px"><i class="fas fa-plus"></i> Tambah Data</a>
                    <!-- <a href="<?php echo site_url('dashboard/form_tambah_petugas') ?>" class="btn btn-primary mt-2 mb-3"><i class="fas fa-plus">&nbsp;</i> Tambah Data</a>  -->
                    <a href="<?php echo site_url('dashboard/cetak_pdf_petugas');?>" class="btn btn-info mt-2 mb-3" style="margin-left: 540px"><i class="fas fa-download mr-2"></i> Download PDF</a> 
                    <a href="<?php echo site_url('dashboard/cetak_xls_petugas');?>" class="btn btn-warning ml-2 mt-2 mb-3 mr-3"><i class="fas fa-download mr-2"></i> Download Excel</a> 
                </div>
            
                    <table class="table table-bordered" id="data" style="width:100%">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">ID Petugas</th>
                                <th scope="col">Nama Petugas</th>
                                <th scope="col">Username</th>
                                <th scope="col">Password</th>
                                <th scope="col">No Telpon</th>
                                <th scope="col">Email</th>
                                <th scope="col">Level</th>
                                <th scope="col" colspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="target">
                            
                        </tbody>
                    </table>
            </div>
        </div>  
    </div>
</div>

        <div class="modal fade" id="form" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <table width="100%">
                            <tr>
                                <td><h1>Data Petugas</h1></td>
                            </tr>
                            <tr>
                                <td>
                                    <center>
                                        <font color="red">
                                            <p id="pesan" class="mt-3"></p>
                                        </font>
                                    </center>
                                </td>
                            </tr>
                        </table>
                        
                    
                    </div>

                    <table class="table">
                        <tr>
                            <td>Nama Petugas</td>
                            <td><input type="text" name="nama_petugas" placeholder="Nama Petugas" class="form-control"></td>
                            <input type="hidden" name="id_petugas" value="">
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td><input type="text" name="username" placeholder="Username" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="text" name="password" placeholder="Password" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>No Telpon</td>
                            <td><input type="number" name="telp" placeholder="No Telpon" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" name="email" placeholder="Email" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Level</td>
                            <td>
                                <select name="level" class="form-control">
                                    <option value="">Pilih Level...</option>
                                    <option value="admin">Admin</option>
                                    <option value="petugas">Petugas</option>
                                </select>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>Profil</td>
                            <td><input type="text" name="image" placeholder="Profil" ></td>
                        </tr>
                        <tr>
                            <td>
                            
                            </td>
                            <td>
                                <button type="button" id="btn-tambah" onclick="tambahdata()" class="btn btn-primary">Tambah</button>
                                <button type="button" id="btn-ubah" onclick="ubahdata()" class="btn btn-primary">Ubah</button>
                                <button type="button" data-dismiss="modal" class="btn btn-danger">Batal</button>
                            </td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
  

<script type="text/javascript">
        ambilData();
    
        function ambilData() {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("dashboard/ambildataPetugas") ?>',
                dataType: 'json',
                success: function(data) {
                    var baris = '';
                    for (var i = 0; i < data.length; i++) {
                        baris += '<tr>' +
                            '<td class="text-center">' + data[i].id_petugas + '</td>' +
                            '<td>' + data[i].nama_petugas + '</td>' +
                            '<td>' + data[i].username + '</td>' +
                            '<td>' + data[i].password + '</td>' +
                            '<td>' + data[i].telp + '</td>' +
                            '<td>' + data[i].email + '</td>' +
                            '<td>' + data[i].level + '</td>' +
                            '<td class="text-center"><a href="#form" data-toggle="modal" class="btn btn-success" onclick="submit(' + data[i].id_petugas+ ')"> ubah</a></td>'+
                            '<td class="text-center"><a onclick="hapusdata(' + data[i].id_petugas + ')" class="btn btn-danger text-white"> hapus</a></td>' +
                            '</tr>';
                    }
                    $('#target').html(baris);
                }
            });
        }

        function tambahdata() {
            var nama_petugas = $("[name='nama_petugas']").val();
            var username     = $("[name='username']").val();
            var password     = $("[name='password']").val();
            var telp         = $("[name='telp']").val();
            var email        = $("[name='email']").val();
            var level        = $("[name='level']").val();
            var image        = $("[name='image']").val();

            $.ajax({
                type: 'POST',
                data: 'nama_petugas=' + nama_petugas +
                    '&username=' + username +
                    '&password=' + password +
                    '&telp=' + telp +
                    '&email=' + email +
                    '&level=' + level +
                    '&image=' + image,

                url: '<?php echo base_url("dashboard/tambahdataPetugas") ?>',
                dataType: 'json',
                success: function(hasil) {
                    
                    $("#pesan").html(hasil.pesan);
                   
                    if (hasil.pesan == '') {
                        $("#form").modal('hide');
                        ambilData();

                        $("[name='nama_petugas']").val('');
                        $("[name='username']").val('');
                        $("[name='password']").val('');
                        $("[name='telp']").val('');
                        $("[name='email']").val('');
                        $("[name='level']").val('');
                        $("[name='image']").val('');

                    }
                }
            });
        }

        function submit(x) {
            if (x == 'tambah') {
                $('#btn-tambah').show();
                $('#btn-ubah').hide();
            } else {
                $('#btn-tambah').hide();
                $('#btn-ubah').show();

                $.ajax({
                    type: 'POST',
                    data: 'id_petugas=' + x,
                    url: '<?php echo base_url("dashboard/ambil_IdPetugas") ?>',
                    dataType: 'json',
                    success: function(hasil) {
                        $('[name="id_petugas"]').val(hasil[0].id_petugas);
                        $('[name="nama_petugas"]').val(hasil[0].nama_petugas);
                        $('[name="username"]').val(hasil[0].username);
                        $('[name="password"]').val(hasil[0].password);
                        $('[name="telp"]').val(hasil[0].telp);
                        $('[name="email"]').val(hasil[0].email);
                        $('[name="level"]').val(hasil[0].level);
                        $('[name="image"]').val(hasil[0].image);
                    }
                });
            }

        }

        function ubahdata() {
            var id_petugas   = $("[name='id_petugas']").val();
            var nama_petugas = $("[name='nama_petugas']").val();
            var username     = $("[name='username']").val();
            var password     = $("[name='password']").val();
            var telp         = $("[name='telp']").val();
            var email        = $("[name='email']").val();
            var level        = $("[name='level']").val();
            var image        = $("[name='image']").val();

            $.ajax({
                type: 'POST',
                data: 'id_petugas=' + id_petugas +
                    '&nama_petugas=' + nama_petugas +
                    '&username=' + username +
                    '&password=' + password +
                    '&telp=' + telp +
                    '&email=' + email +
                    '&level=' + level +
                    '&image=' + image ,
                url: '<?php echo base_url("dashboard/ubahdataPetugas") ?>',
                dataType: 'json',
                success: function(hasil) {
                    $("#pesan").html(hasil.pesan);

                    if (hasil.pesan == '') {
                        $("#form").modal('hide');
                        ambilData();
                    }
                }
            })
        }

        function hapusdata(id_petugas) {
            var tanya = confirm('Apakah anda yakin akan menghapus data?'); 
            if (tanya) {
                $.ajax({
                    type: 'POST',
                    data: 'id_petugas=' + id_petugas,
                    url: '<?php echo base_url("dashboard/hapusdataPetugas") ?>',
                    success: function(response) {
                        ambilData();

                    }
                });
            }
        }
</script>