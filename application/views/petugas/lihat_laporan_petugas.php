<div class="col-md-10 p-4">
<h3></i>Data Pengaduan</h3><hr>
<div class="card shadow mb-4">
    <!-- <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div> -->
    <div class="card-body">
        <table class="table table-bordered" id="data" style="width:100%">
            <thead>
                <tr class="text-center">
                    <th scope="col">ID</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Isi Laporan</th>
                    <th scope="col">Status</th>
                    <th scope="col" colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody id="target">
              
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <table width="100%">
                    <tr>
                        <td><h1>Tanggapan Pengaduan</h1></td>
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
                    <td>ID Pengaduan</td>
                    <td><input type="text" name="id_pengaduan" class="form-control" readonly></td>
                </tr>
                <tr>
                    <td>Tanggal Tanggapan</td>
                    <td><input type="date" name="tgl_tanggapan" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly></td>
                </tr>
                <tr>
                    <td>Tulis Tanggapan</td>
                    <td><textarea name="tanggapan" cols="30" rows="5" class="form-control"></textarea></td>
                </tr>
                <tr>
                    <td>ID Petugas</td>
                    <td><input type="text" name="id_petugas" class="form-control" value="<?php echo $this->session->userdata('id_petugas');?>" readonly></td>
                </tr>
                
                <tr>
                    <td>
                    
                    </td>
                    <td>
                        <button type="button" id="btn-tambah" onclick="tanggapiPengaduan()" class="btn btn-primary">Tanggapi</button>
                        <button type="button" data-dismiss="modal" class="btn btn-danger">Batal</button>
                    </td>
                </tr>
            </table>

        </div>
    </div>
</div>
</div>
</div>

<script type="text/javascript">
        ambilData();
    
        function ambilData() {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("dashboard/ambildataPengaduan") ?>',
                dataType: 'json',
                success: function(data) {
                    var baris = '';
                    for (var i = 0; i < data.length; i++) {
                        baris += '<tr>' +
                            '<td class="text-center">' + data[i].id_pengaduan + '</td>' +
                            '<td>' + data[i].tgl_pengaduan + '</td>' +
                            '<td>' + data[i].nik + '</td>' +
                            '<td>' + data[i].isi_laporan + '</td>' +
                            '<td class="text-center">' + data[i].status + '</td>' +
                            '<td class="text-center"><a onclick="" class="btn btn-primary text-white">verifikasi</a></td>'+
                            '<td class="text-center"><a href="#form" data-toggle="modal" class="btn btn-danger" onclick="submit(' + data[i].id_pengaduan+ ')">tangggapi</a></td>' +
                            '</tr>';
                    }
                    $('#target').html(baris);
                }
            });
        }

        function submit(x) {
            if (x == 'tambah') {
                $('#btn-ubah').show();
            } else {
                $('#btn-tambah').show();
            
                $.ajax({
                    type: 'POST',
                    data: 'id_pengaduan=' + x,
                    url: '<?php echo base_url("dashboard/ambil_idPengaduan") ?>',
                    dataType: 'json',
                    success: function(hasil) {
                        $('[name="id_pengaduan"]').val(hasil[0].id_pengaduan);
                    
                    }
                });
            }
        }

        function tanggapiPengaduan() {
            var id_pengaduan  = $("[name='id_pengaduan']").val();
            var tgl_tanggapan = $("[name='tgl_tanggapan']").val();
            var tanggapan     = $("[name='tanggapan']").val();
            var id_petugas    = $("[name='id_petugas']").val();
        
            $.ajax({
                type: 'POST',
                data: 'id_pengaduan=' + id_pengaduan +
                    '&tgl_tanggapan=' + tgl_tanggapan +
                    '&tanggapan=' + tanggapan +
                    '&id_petugas=' + id_petugas,

                url: '<?php echo base_url("dashboard/tanggapi_pengaduan") ?>',
                dataType: 'json',
                success: function(hasil) {
                    
                    $("#pesan").html(hasil.pesan);
                   
                    if (hasil.pesan == '') {
                        $("#form").modal('hide');
                        ambilData();

                        $("[name='id_pengaduan']").val('');
                        $("[name='tgl_tanggapan']").val('');
                        $("[name='tanggapan']").val('');
                        $("[name='id_petugas']").val('');
                    

                    }
                }
            });
        }
</script>
