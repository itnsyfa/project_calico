<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800" style="display: flex; align-items: center;">
        <span>Data Grooming</span>
    </h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-end">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
            <div class="row">
                <div class="col-md-6 text-right">
                    <button class="btn btn-info mb-2" style="width: 180px;" data-toggle="modal" data-target="#tambahGroomingModal">Tambah Grooming</button>
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
                            <td>Kode Groom</td>
                            <td>Nama Pemilik</td>
                            <td>Tanggal</td>
                            <td>QTY</td>
                            <td>Jenis Grooming</td>
                            <td>No HP</td>
                            <td>Keterangan</td>
                            <td>Harga</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($groom as $us) : ?>
                            <tr>
                                <td><?= $i; ?>.</td>
                                <td>GROOM<?= $us['id_groom']; ?></td>
                                <td><?= $us['nama_pemilik']; ?></td>
                                <td><?= $us['tanggal']; ?></td>
                                <td><?= $us['qty']; ?></td>
                                <td><?= $us['nama_jasa']; ?></td>
                                <td><?= $us['no_hp']; ?></td>
                                <td><?= $us['keterangan']; ?></td>
                                <td>Rp <?= number_format($us['harga_groom'], 0, ',', '.'); ?></td>
                                <td style="text-align: center;">
                                    <div class="dropdown no-arrow mb-4 animated--grow-in">
                                        <button class="btn btn-info dropdown-toggle" style="width: 40px;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-info-circle"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="btn btn-sm btn-info dropdown-item" href="<?= base_url('Grooming/hapus/') . $us['id_groom']; ?>" style="display: flex; align-items: center;">
                                                Hapus
                                                <i class="fas fa-trash" style="margin-left: 5px;"></i>
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="btn btn-sm btn-info dropdown-item" href="<?= base_url('Grooming/edit/') . $us['id_groom']; ?>" style="display: flex; align-items: center;">
                                                Edit
                                                <i class="fas fa-edit" style="margin-left: 5px;"></i>
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="btn btn-sm btn-info dropdown-item" href="<?= base_url('Grooming/detail/') . $us['id_groom']; ?>" style="display: flex; align-items: center;">
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

<br>
<!-- /.container-fluid -->

<!-- Modal -->
<div class="modal fade" id="tambahGroomingModal" tabindex="-1" role="dialog" aria-labelledby="tambahGroomingModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="tambahGroomingModalLabel">Form Tambah Data Grooming</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formTambahGrooming" action="<?= base_url('Grooming/upload'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama_pemilik">Nama Pemilik</label>
                        <input type="text" name="nama_pemilik" class="form-control" id="nama_pemilik" placeholder="Masukkan Nama Pemilik">
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="tanggal" placeholder="Masukkan Tanggal">
                    </div>
                    <div class="form-group">
                        <label for="qty">QTY</label>
                        <input type="number" name="qty" class="form-control" id="qty" placeholder="Jumlah Hewan" min="0" step="1">
                    </div>
                    <div class="form-group" id="grupjasa">
                        <label for="inNamaJasa">Jenis Grooming</label>
                        <select class="form-control filled-input select2" name="inNamaJasa" id="inNamaJasa">
                            <option value="-">-</option>
                            <?php foreach ($list_jasa as $row) : ?>
                                <option value="<?= $row['id_jasa']; ?>"><?= $row['nama_jasa']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No Hp</label>
                        <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="Masukkan No Hp">
                    </div>
                    <div class="form-group" id="grupket">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="keterangan" rows="3" placeholder="Keterangan"></textarea>
                    </div>
                    <div class="form-group" id="grupharga">
                        <label for="harga">Harga</label>
                        <input type="number" name="harga" class="form-control" id="harga" placeholder="" readonly>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        <button type="button" name="tambah" id="simpanGrooming" class="btn btn-primary float-right">Tambah Grooming</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Load jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Load Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<!-- Load Select2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<!-- Load SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        // Ketika tombol "Simpan" di klik
        $('#simpanGrooming').click(function(e) {
            e.preventDefault(); // Mencegah submit form default
            // Menampilkan konfirmasi menggunakan SweetAlert
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin menambahkan data grooming?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
            }).then((result) => {
                // Jika pengguna mengklik "Ya"
                if (result.isConfirmed) {
                    // Lakukan AJAX request untuk menyimpan data supplier
                    $.ajax({
                        url: '<?= base_url('Grooming/tambah/') ?>',
                        type: 'POST',
                        data: $('#formTambahGrooming').serialize(),
                        dataType: 'json',
                        success: function(response) {
                            console.log(response);
                            if (response.status === 'success') {
                                var namaGrooming = $('#nama_pemilik').val();
                                // Jika penyimpanan berhasil, tampilkan pesan sukses
                                Swal.fire({
                                    title: 'Sukses!',
                                    text: 'Grooming ' + namaGrooming + ' berhasil ditambahkan.',
                                    icon: 'success',
                                    timer: 2000, // Durasi tampilan pesan sukses
                                    showConfirmButton: false
                                }).then(() => {
                                    // Refresh halaman setelah 2 detik
                                    setTimeout(function() {
                                        location.reload();
                                    }, 2000);
                                });
                            } else {
                                // Jika penyimpanan gagal, tampilkan pesan error
                                Swal.fire({
                                    title: 'Gagal!',
                                    text: 'Masukkan data yang sesuai.',
                                    icon: 'error'
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            // Handle error jika terjadi kesalahan dalam AJAX request
                            console.error('AJAX Error: ', status, error);
                            Swal.fire({
                                title: 'Gagal!',
                                text: 'Terjadi kesalahan saat melakukan request.',
                                icon: 'warning'
                            });
                        }
                    });
                }
            });
        });

    });

    $(document).ready(function() {
        $('#ras').select2({
            placeholder: "Pilih Ras",
            allowClear: true // menambahkan opsi clear pada Select2
        });
    });

    $(document).ready(function() {
        $('#spesies').select2({
            placeholder: "Pilih Spesies",
            allowClear: true // menambahkan opsi clear pada Select2
        });
    });

    function calculateTotalPrice() {
        var totalHarga = 0;
        var qty = document.getElementById('qty').value;
        var id_jasa = document.getElementById('inNamaJasa').value;

        if (id_jasa === "-") {
            document.getElementById('harga').value = totalHarga;
            return;
        }

        $.ajax({
            url: '<?= base_url('Grooming/get_jasa_harga'); ?>',
            type: 'POST',
            data: {
                id_jasa: id_jasa
            },
            dataType: 'json',
            success: function(data) {
                totalHarga = parseInt(data.harga) * qty;
                document.getElementById('harga').value = totalHarga;
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('inNamaJasa').addEventListener('change', calculateTotalPrice);
        document.getElementById('qty').addEventListener('input', calculateTotalPrice);
        calculateTotalPrice(); // Calculate on page load
    });
</script>

</body>

</html>