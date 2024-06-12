<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row justify-content-center">
        <div class="col-md-8 mb-5">
            <div class="card">
                <div class="card-header bg-info text-white text-center">
                    Form Tambah Data Grooming
                </div>

                <div class="card-body">
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
                            <a href="<?= base_url('Grooming') ?>" class="btn btn-danger">Tutup</a>
                            <button type="submit" name="tambah" id="simpanGrooming" class="btn btn-primary float-right">Tambah Grooming</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Load jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Load Select2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Tambahkan SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        // Ketika tombol "Simpan" di klik
        $('#simpanGrooming').click(function() {
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
                        url: '<?= base_url('grooming/tambah/') ?>',
                        type: 'POST',
                        data: $('#formTambahGrooming').serialize(),
                        dataType: 'json',
                        success: function(response) {
                            console.log(response.status);
                            if (response.status == 'success') {
                                var namaGrooming = $('#nama_pemilik').val();
                                // Jika penyimpanan berhasil, tampilkan pesan sukses
                                Swal.fire({
                                    title: 'Sukses!',
                                    text: 'Grooming ' + namaGrooming + ' berhasil ditambahkan.',
                                    icon: 'success'
                                }).then(() => {
                                    // Refresh halaman
                                    location.reload();
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
                        error: function() {
                            // Handle error jika terjadi kesalahan dalam AJAX request
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
</script>
<script>
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