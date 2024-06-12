<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800" style="display: flex; align-items: center;">
        <span>Data Jasa</span>
    </h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-end">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
            <div class="row">
                <div class="col-md-6 text-right"> <!-- Bagian kanan -->
                    <a href="<?= base_url() ?>Jasa/tambah" class="btn btn-info mb-2" style="width: 180px;">Tambah Jasa</a>
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
                            <td>Nama Jasa</td>
                            <td>Harga Jasa</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($jasa as $us) : ?>
                            <tr>
                                <td><?= $i; ?>.</td>
                                <td><?= $us['nama_jasa']; ?></td>
                                <td>Rp <?= number_format($us['harga'], 0, ',', '.'); ?></td>
                                <td style="text-align: center;">
                                    <div class="dropdown no-arrow mb-4 animated--grow-in">
                                        <button class="btn btn-info dropdown-toggle" style="width: 40px;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-info-circle"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="btn btn-sm btn-info dropdown-item" href="<?= base_url('Jasa/hapus/') . $us['id_jasa']; ?>" style="display: flex; align-items: center;">
                                                Hapus
                                                <i class="fas fa-trash" style="margin-left: 5px;"></i>
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="btn btn-sm btn-info dropdown-item btn-edit" data-id="<?= $us['id_jasa']; ?>" style="display: flex; align-items: center;">
                                                Edit
                                                <i class="fas fa-edit" style="margin-left: 5px;"></i>
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="btn btn-sm btn-info dropdown-item" href="<?= base_url('Jasa/detail/') . $us['id_jasa']; ?>" style="display: flex; align-items: center;">
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

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Jasa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editForm">
                <div class="modal-body">
                    <input type="hidden" id="editId" name="id_jasa">
                    <div class="form-group">
                        <label for="editNamaJasa">Nama Jasa</label>
                        <input type="text" class="form-control" id="editNamaJasa" name="nama_jasa">
                    </div>
                    <div class="form-group">
                        <label for="editHarga">Harga Jasa</label>
                        <input type="text" class="form-control" id="editHarga" name="harga">
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
            url: '<?= base_url("Jasa/getById/") ?>' + id,
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#editId').val(response.id_jasa);
                $('#editNamaJasa').val(response.nama_jasa);
                $('#editHarga').val(response.harga);
                $('#editModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.error('Terjadi kesalahan:', xhr.responseText);
            }
        });
    });

    $('#editForm').on('submit', function(e) {
        e.preventDefault();
        var id = $('#editId').val();
        var nama_jasa = $('#editNamaJasa').val();
        var harga = $('#editHarga').val();

        $.ajax({
            url: '<?= base_url("Jasa/update") ?>',
            method: 'POST',
            data: {
                id_jasa: id,
                nama_jasa: nama_jasa,
                harga: harga
            },
            success: function(response) {
                console.log('Data berhasil disimpan');
                $('#editModal').modal('hide');
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error('Terjadi kesalahan:', xhr.responseText);
            }
        });
    });
});
</script>
