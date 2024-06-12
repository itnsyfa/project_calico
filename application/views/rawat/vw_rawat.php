<!-- Begin Page Content -->
<div class="container-fluid">
<?php if ($this->session->flashdata('success')) : ?>
                       <div class="alert alert-success alert-dismissible fade show" role="alert">
                           <?= $this->session->flashdata('success') ?>
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                       </div>
                   <?php elseif ($this->session->flashdata('error')) : ?>
                       <div class="alert alert-danger alert-dismissible fade show" role="alert">
                           <?= $this->session->flashdata('error') ?>
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                       </div>
                   <?php endif ?>
    <h1 class="h3 mb-2 text-gray-800" style="display: flex; align-items: center;">
        <span>Data Rawat</span>
    </h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-end">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
            <div class="row">
                <div class="col-md-6 text-right"> <!-- Bagian kanan -->
                    <a href="<?= base_url() ?>Rawat/tambah" class="btn btn-info mb-2" style="width: 180px;">Tambah Rawat</a>
                </div>
            </div>
        </div>
        <!-- DataTales Example -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Kode Rawat</td>
                            <td>Nama Hewan</td>
                            <td>Tanggal Masuk</td>
                            <td>Diagnosa</td>
                            <td>Berat Badan</td>
                            <td>Suhu Badan</td>
                            <td>Gejala Klinis</td>
                            <td>Perawatan</td>
                            <td>Dokter</td>
                            <td>Therapy</td>
                            <td>Harga</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($rawat as $us) : ?>
                            <tr>
                                <td><?= $i; ?>.</td>
                                <td><?= strtoupper($us['id_rawat']); ?></td>
                                <td><?= $us['nama_hewan']; ?></td>
                                <td><?= $us['tanggal_masuk']; ?></td>
                                <td><?= $us['diagnosa']; ?></td>
                                <td><?= $us['berat_badan']; ?> kg</td>
                                <td><?= $us['suhu_badan']; ?> °C</td>
                                <td><?= $us['gejala_klinis']; ?></td>
                                <td><?= $us['perawatan']; ?></td>
                                <td><?= $us['dokter']; ?></td>
                                <td>
                                    <?php
                                    $nama_jasa_ids = explode(',', $us['therapy']);
                                    $counter = 1;
                                    foreach ($nama_jasa_ids as $jasa_id) {
                                        // Ambil nama jasa berdasarkan ID
                                        $nama_jasa = $this->db->get_where('jasa', array('id_jasa' => $jasa_id))->row()->nama_jasa;
                                        echo $counter . '. ' . $nama_jasa . '<br>';
                                        $counter++;
                                    }
                                    ?>
                                </td>
                                <td>Rp <?= number_format($us['harga'], 0, ',', '.'); ?></td>

                                <td style="text-align: center;">
                                    <div class="dropdown no-arrow mb-4 animated--grow-in">
                                        <button class="btn btn-info dropdown-toggle" style="width: 40px;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-info-circle"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="btn btn-sm btn-info dropdown-item" href="<?= base_url('Rawat/hapus/') . $us['id_rawat']; ?>" style="display: flex; align-items: center;">
                                                Hapus
                                                <i class="fas fa-trash" style="margin-left: 5px;"></i>
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="btn btn-sm btn-info dropdown-item" href="<?= base_url('Rawat/edit/') . $us['id_rawat']; ?>" style="display: flex; align-items: center;">
                                                Edit
                                                <i class="fas fa-edit" style="margin-left: 5px;"></i>
                                            </a>

                                            <div class="dropdown-divider"></div>
                                            <!-- <a class="btn btn-sm btn-info dropdown-item detailButton" data-id="<?= $us['id_rawat']; ?>" data-toggle="modal"  style="display: flex; align-items: center;">
                                                Detail
                                                <i class="fas fa-info" style="margin-left: 5px;"></i>
                                            </a> -->
                                            <button type="button" style="display: flex; align-items: center;" class="btn btn-sm btn-info dropdown-item detailButton" data-toggle="modal" data-target="#detailModal<?= $i; ?>">
                                                Detail
                                            </button>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<!-- End of Main Content -->

<?php foreach ($rawat as $key => $us) : ?>
    <div class="modal fade" id="detailModal<?= $key + 1; ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel<?= $key + 1; ?>" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel<?= $key + 1; ?>">Detail Data Rawat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <ul class="list-group">
                                <li class="list-group-item"><strong>Nama Hewan:</strong> <?= $us['nama_hewan']; ?></li>
                                <li class="list-group-item"><strong>Tanggal Masuk:</strong> <?= $us['tanggal_masuk']; ?></li>
                                <li class="list-group-item"><strong>Diagnosa:</strong> <?= $us['diagnosa']; ?></li>
                                <li class="list-group-item"><strong>Berat Badan:</strong> <?= $us['berat_badan']; ?> Kg</li>
                                <li class="list-group-item"><strong>Suhu Badan:</strong> <?= $us['suhu_badan']; ?> °C</li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="list-group">
                                <li class="list-group-item"><strong>Gejala Klinis:</strong> <?= $us['gejala_klinis']; ?></li>
                                <li class="list-group-item"><strong>Perawatan:</strong> <?= $us['perawatan']; ?></li>
                                <li class="list-group-item"><strong>Dokter:</strong> <?= $us['dokter']; ?></li>
                                <li class="list-group-item"><strong>Tanggal Diberi Obat:</strong> <?= $us['tgl_diberi_obat']; ?></li>
                                <li class="list-group-item"><strong>Waktu:</strong> <?= $us['waktu']; ?></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="list-group">
                                <li class="list-group-item"><strong>Keterangan:</strong> <?= $us['keterangan']; ?></li>
                                <li class="list-group-item"><strong>Therapy:</strong> <?= $us['therapy']; ?></li>
                                <li class="list-group-item"><strong>Status:</strong> <?= $us['status']; ?></li>
                                <li class="list-group-item"><strong>Tanggal Keluar:</strong> <?= $us['tanggal_keluar']; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<!-- End of Main Content -->




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('.detailButton').click(function() {
            var id = $(this).data('id');

            // Menggunakan AJAX untuk mengambil detail data
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url('Rawat/detail/') ?>' + id,
                success: function(response) {
                    // Memuat respons ke dalam elemen dengan id 'detailData'
                    $('#detailData').html(response);
                    // Menampilkan modal dengan id 'detailModal'
                    $('#detailModal').modal('show');
                },
                error: function(xhr, status, error) {
                    // Menangani kesalahan jika permintaan AJAX gagal
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>