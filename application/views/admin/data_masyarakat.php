    <div class="col-md-10 p-4">
        <h3></i>Data Masyarakat</h3><hr class="mb-4">
        <div class="card shadow mb-4">
            <!-- <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div> -->
            <div class="card-body">
                <div class="row mt-2 ml-1 mb-4">
                    <a href="<?php echo site_url('dashboard/cetak_pdf_masyarakat');?>" class="btn btn-info mt-2 mb-3"><i class="fas fa-download mr-2"></i> Download PDF</a> 
                    <a href="<?php echo site_url('dashboard/cetak_xls_masyarakat');?>" class="btn btn-warning ml-2 mt-2 mb-3"><i class="fas fa-download mr-2"></i> Download Excel</a> 
                </div>
                
                <table class="table table-bordered" id="data" style="width:100%">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">NIK</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Username</th>
                            <th scope="col">Password</th>
                            <th scope="col">No Telpon</th>
                            <th scope="col">Email</th>
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

<script type="text/javascript">
        ambilData();
    
        function ambilData() {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("dashboard/ambildataMasyarakat") ?>',
                dataType: 'json',
                success: function(data) {
                    var baris = '';
                    for (var i = 0; i < data.length; i++) {
                        baris += '<tr>' +
                            '<td class="text-center">' + data[i].nik + '</td>' +
                            '<td>' + data[i].nama + '</td>' +
                            '<td>' + data[i].username + '</td>' +
                            '<td>' + data[i].password + '</td>' +
                            '<td>' + data[i].telp + '</td>' +
                            '<td>' + data[i].email + '</td>' +
                            '<td class="text-center"><a onclick="hapusdata(' + data[i].nik + ')" class="btn btn-danger text-white mt-2"> hapus</a></td>' +
                            '</tr>';
                    }
                    $('#target').html(baris);
                }
            });
        }

        function hapusdata(nik) {
            var tanya = confirm('Apakah anda yakin akan menghapus data?'); 
            if (tanya) {
                $.ajax({
                    type: 'POST',
                    data: 'nik=' + nik,
                    url: '<?php echo base_url("dashboard/hapusdata_Masyarakat") ?>',
                    success: function(response) {
                        ambilData();

                    }
                });
            }
        }
</script>