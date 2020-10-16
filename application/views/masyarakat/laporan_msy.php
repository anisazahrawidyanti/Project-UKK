<div class="col-md-10 p-4">
    <div class="card shadow mt-3 mb-2">
        <!-- <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div> -->
        <div class="card-body">
            <div class="row">
                <i class="fas fa-file ml-4" style="font-size: 30px"></i>
                <h3 class="ml-3">Data Pengaduan</h3>
            </div>

        <hr class="mb-3">

        <a href="#form" data-toggle="modal" class="btn btn-primary mr-3" onclick="submit('tambah')" style="height: 40px"><i class="fas fa-plus"></i> Tambah Data</a>

            <div class="table-responsive mt-4">
                <table class="table table-bordered" id="data" style="width:100%">
                    <thead>
                        <tr style="text-align:center">
                            <th scope="col">ID Pengaduan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Isi Laporan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
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
                        <td><h1>Tulis Pengaduan</h1></td>
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
                    <td>Tanggal Pengaduan</td>
                    <td><input type="date" name="tgl_pengaduan" placeholder="Tanggal Pengaduan" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly></td>
                    <input type="hidden" name="id_petugas" value="">
                </tr>
                <tr>
                    <td>NIK</td>
                    <td><input type="text" name="nik" placeholder="NIK" class="form-control" value="<?php echo $this->session->userdata('nik');?>"  readonly></td>
                </tr>
                <tr>
                    <td>Isi Laporan</td>
                    <td><textarea name="isi_laporan" cols="30" rows="5" placeholder="Isi Laporan" class="form-control"></textarea></td>
                </tr>
                <tr>
                    <td>Gambar</td>
                    <td><input type="text" name="image" placeholder="Gambar" class="form-control"></td>
                </tr>
                <tr>
                    <td>
                    
                    </td>
                    <td>
                        <button type="button" id="btn-tambah" onclick="tambahdata()" class="btn btn-primary">Tambah</button>
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
                        '<td class="text-center"><a href="<?php echo site_url('Dashboard/lihat_tanggapan_msy') ?>" onclick="" class="btn btn-info text-white">lihat tanggapan</a></td>'+
                        '</tr>';
                }
                $('#target').html(baris);
            }
        });
    }

    function tambahdata() {
        var tgl_pengaduan = $("[name='tgl_pengaduan']").val();
        var nik           = $("[name='nik']").val();
        var isi_laporan   = $("[name='isi_laporan']").val();
        var image         = $("[name='image']").val();

            $.ajax({
                type: 'POST',
                data: 'tgl_pengaduan=' + tgl_pengaduan +
                    '&nik=' + nik +
                    '&isi_laporan=' + isi_laporan +
                    '&image=' + image,

                url: '<?php echo base_url("dashboard/tambahdataPengaduan") ?>',
                dataType: 'json',
                success: function(hasil) {
                    
                    $("#pesan").html(hasil.pesan);
                   
                    if (hasil.pesan == '') {
                        $("#form").modal('hide');
                        ambilData();

                        $("[name='isi_laporan']").val('');
                        $("[name='image']").val('');

                    }
                }
            });
    }

</script>