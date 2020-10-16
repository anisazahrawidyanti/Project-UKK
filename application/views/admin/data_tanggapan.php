    <div class="col-md-10 p-4">
        <h3></i>Data Tanggapan</h3><hr>
        <div class="card shadow mt-4">
            <!-- <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div> -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered mt-3" id="data" style="width:100%">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">ID Tanggapan</th>
                                <th scope="col">ID Pengaduan</th>
                                <th scope="col">Tanggal Tanggapan</th>
                                <th scope="col">Tanggapan</th>
                                <th scope="col">ID Petugas</th>
                                <th scope="col" colspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="target">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="modal fade" id="form" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <table width="100%">
                            <tr>
                                <td><h1>Data Tanggapan</h1></td>
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
                            <td>ID Tanggapan</td>
                            <td><input type="text" name="id_tanggapan" placeholder="ID Tanggapan" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>ID Pengaduan</td>
                            <td><input type="text" name="id_pengaduan" placeholder="ID Pengaduan" class="form-control" readonly></td>
                        </tr>
                        <tr>
                            <td>Tanggal Tanggapan</td>
                            <td><input type="date" name="tgl_tanggapan" placeholder="Tanggal Tanggapan" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Isi Tanggapan</td>
                            <td><textarea name="tanggapan" placeholder="Isi Tanggapan" class="form-control" cols="20" rows="5"></textarea></td>
                        </tr>
                        <tr>
                            <td>ID Petugas</td>
                            <td><input type="text" name="id_petugas" placeholder="ID Petugas" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>
                            
                            </td>
                            <td>
                                <button type="button" id="btn-ubah" onclick="ubahdata()" class="btn btn-primary">Ubah</button>
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
                url: '<?php echo base_url("dashboard/ambildataTanggapan") ?>',
                dataType: 'json',
                success: function(data) {
                    var baris = '';
                    for (var i = 0; i < data.length; i++) {
                        baris += '<tr>' +
                            '<td class="text-center">' + data[i].id_tanggapan + '</td>' +
                            '<td class="text-center">' + data[i].id_pengaduan + '</td>' +
                            '<td>' + data[i].tgl_tanggapan + '</td>' +
                            '<td>' + data[i].tanggapan + '</td>' +
                            '<td class="text-center">' + data[i].id_petugas + '</td>' +
                            '<td class="text-center"><a href="#form" data-toggle="modal" class="btn btn-success" onclick="submit(' + data[i].id_tanggapan+ ')"> ubah</a></td>' +
                            '<td class="text-center"><a onclick="hapusdata(' + data[i].id_tanggapan + ')" class="btn btn-danger text-white"> hapus</a></td>' +
                            '</tr>';
                    }
                    $('#target').html(baris);
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
                    data: 'id_tanggapan=' + x,
                    url: '<?php echo base_url("dashboard/ambil_IdTanggapan") ?>',
                    dataType: 'json',
                    success: function(hasil) {
                        $('[name="id_tanggapan"]').val(hasil[0].id_tanggapan);
                        $('[name="id_pengaduan"]').val(hasil[0].id_pengaduan);
                        $('[name="tgl_tanggapan"]').val(hasil[0].tgl_tanggapan);
                        $('[name="tanggapan"]').val(hasil[0].tanggapan);
                        $('[name="id_petugas"]').val(hasil[0].id_petugas);
                    }
                });
            }
        }

        function ubahdata() {
            var id_tanggapan   = $("[name='id_tanggapan']").val();
            var id_pengaduan   = $("[name='id_pengaduan']").val();
            var tgl_tanggapan  = $("[name='tgl_tanggapan']").val();
            var tanggapan      = $("[name='tanggapan']").val();
            var id_petugas     = $("[name='id_petugas']").val();

            $.ajax({
                type: 'POST',
                data: 'id_tanggapan=' + id_tanggapan +
                    '&id_pengaduan=' + id_pengaduan +
                    '&tgl_tanggapan=' + tgl_tanggapan +
                    '&tanggapan=' + tanggapan +
                    '&id_petugas=' + id_petugas,

                url: '<?php echo base_url("dashboard/ubahdataTanggapan") ?>',
                dataType: 'json',
                success: function(hasil) {
                    $("#pesan").html(hasil.pesan);

                    if (hasil.pesan == '') {
                        $("#form").modal('hide');
                        ambilData();
                    }
                }
            });
        }

        function hapusdata(id_tanggapan) {
            var tanya = confirm('Apakah anda yakin akan menghapus data?'); 
            if (tanya) {
                $.ajax({
                    type: 'POST',
                    data: 'id_tanggapan=' + id_tanggapan,
                    url: '<?php echo base_url("dashboard/hapusdataTanggapan") ?>',
                    success: function(response) {
                        ambilData();

                    }
                });
            }
        }
</script>