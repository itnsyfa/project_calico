<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800" style="display: flex; align-items: center;">
        <span>Data Laporan</span>
    </h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-end">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
            <div class="row">
                <div class="col-md-6 text-right"> <!-- Bagian kanan -->
                    <button class="btn btn-info mb-2" style="width: 180px;" data-toggle="modal" data-target="#tambahModal">Tambah Laporan</button>
                </div>
            </div>
        </div>
        <!-- DataTales Example -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th rowspan="2">No</th>
                            <th rowspan="2">Tanggal</th>
                            <th rowspan="2">Kategori</th>
                            <th rowspan="2">Keterangan</th>
                            <th colspan="2">Jenis</th>
                            <th rowspan="2">Gambar</th>
                            <th rowspan="2">Aksi</th>
                        </tr>
                        <tr>
                            <th>Pemasukkan</th>
                            <th>Pengeluaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($laporan as $us) : ?>
                            <tr>
                                <td><?= $i; ?>.</td>
                                <td><?= $us['tanggal']; ?></td>
                                <td><?= $us['kategori']; ?></td>
                                <td><?= $us['keterangan']; ?></td>
                                <td><?= $us['jenis'] == 'Pemasukan' ? 'Rp ' . number_format($us['nominal'], 0, ',', '.') : ''; ?></td>
                                <td><?= $us['jenis'] == 'Pengeluaran' ? 'Rp ' . number_format($us['nominal'], 0, ',', '.') : ''; ?></td>
                                <td>
                                    <?php
                                    $file_extension = pathinfo($us['gambar'], PATHINFO_EXTENSION);
                                    if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif'])) : ?>
                                        <img src="<?= base_url('assets/img/laporan/') . $us['gambar']; ?>" style="width:100px;" class="img-thumbnail">
                                    <?php elseif ($file_extension == 'pdf') : ?>
                                        <a href="<?= base_url('assets/img/laporan/') . $us['gambar']; ?>" target="_blank">Lihat PDF</a>
                                    <?php endif; ?>
                                </td>



                                <td style="text-align: center;">
                                    <div class="dropdown no-arrow mb-4 animated--grow-in">
                                        <button class="btn btn-info dropdown-toggle" style="width: 40px;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-info-circle"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="btn btn-sm btn-info dropdown-item" href="<?= base_url('Laporan/hapus/') . $us['id_laporan']; ?>" style="display: flex; align-items: center;">
                                                Hapus
                                                <i class="fas fa-trash" style="margin-left: 5px;"></i>
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="btn btn-sm btn-info dropdown-item btn-edit" data-id="<?= $us['id_laporan']; ?>" style="display: flex; align-items: center;">
                                                Edit
                                                <i class="fas fa-edit" style="margin-left: 5px;"></i>
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="btn btn-sm btn-info dropdown-item" href="<?= base_url('Laporan/detail/') . $us['id_laporan']; ?>" style="display: flex; align-items: center;">
                                                Detail
                                                <i class="fas fa-info" style="margin-left: 5px;"></i>
                                            </a>
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

<!-- Modal Tambah Laporan -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Laporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Laporan/upload'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis</label>
                        <select name="jenis" id="jenis" class="form-control">
                            <option value="">Pilih</option>
                            <option value="Pemasukan">Pemasukan</option>
                            <option value="Pengeluaran">Pengeluaran</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select name="kategori" id="kategori" class="form-control">
                            <option value="">Pilih</option>
                            <option value="Biaya Langsung">Biaya Langsung</option>
                            <option value="Biaya Tidak Langsung">Biaya Tidak Langsung</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nominal">Nominal</label>
                        <input type="number" class="form-control" id="nominal" name="nominal" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label><br>
                        <input type="file" name="gambar" class="form_control" id="gambar" placeholder="Gambar">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Laporan -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Laporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editForm" action="<?= base_url('Laporan/update'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" id="editId" name="id_laporan">
                    <div class="form-group">
                        <label for="editTanggal">Tanggal</label>
                        <input type="date" class="form-control" id="editTanggal" name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="editJenis">Jenis</label>
                        <select name="jenis" id="editJenis" class="form-control">
                            <option value="Pemasukan">Pemasukan</option>
                            <option value="Pengeluaran">Pengeluaran</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editKategori">Kategori</label>
                        <select name="kategori" id="editKategori" class="form-control">
                            <option value="Biaya Langsung">Biaya Langsung</option>
                            <option value="Biaya Tidak Langsung">Biaya Tidak Langsung</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editNominal">Nominal</label>
                        <input type="number" class="form-control" id="editNominal" name="nominal" required>
                    </div>
                    <div class="form-group">
                        <label for="editKeterangan">Keterangan</label>
                        <textarea class="form-control" id="editKeterangan" name="keterangan" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="editGambar">Upload File</label>
                        <input type="file" class="form-control-file" id="editGambar" name="gambar">
                        <input type="hidden" id="oldGambar" name="old_gambar">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('.btn-edit').on('click', function() {
            var id = $(this).data('id');
            $.ajax({
                url: '<?= base_url("Laporan/getById/") ?>' + id,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Assign response data to respective form fields
                    $('#editId').val(response.id_laporan);
                    $('#editTanggal').val(response.tanggal);
                    $('#editJenis').val(response.jenis);
                    $('#editKategori').val(response.kategori);
                    $('#editNominal').val(response.nominal);
                    $('#editKeterangan').val(response.keterangan);
                    $('#oldFile').val(response.file ? response.file : ''); // Make sure this is safe
                    $('#editModal').modal('show'); // Show the modal after filling the data
                },
                error: function(xhr, status, error) {
                    console.error('Terjadi kesalahan:', xhr.responseText);
                }
            });
        });

        $('#editForm').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: '<?= base_url("Laporan/update") ?>',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log('Data berhasil disimpan');
                    $('#editModal').modal('hide'); // Hide the modal after successful submission
                    location.reload(); // Reload the page
                },
                error: function(xhr, status, error) {
                    console.error('Terjadi kesalahan:', xhr.responseText);
                }
            });
        });
    });
</script>