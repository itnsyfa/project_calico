<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row justify-content-center">
        <div class="col-md-8 mb-5">
            <div class="card">
                <div class="card-header bg-info text-white text-center">
                    Form Tambah Data Cat Hotel
                </div>

                <div class="card-body">
                    <form action="<?= base_url('Hotel/upload'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group" id="grupnama">
                            <label for="inNamaHewan">Nama Hewan</label>
                            <select class="form-control filled-input select2" name="inNamaHewan" id="inNamaHewan">
                                <option value="-">-</option>
                                <?php foreach ($list_hewan as $row) : ?>
                                    <option value="<?= $row['id_hewan']; ?>"><?= $row['nama_hewan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukkan alamat">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_masuk">Tanggal Masuk</label>
                            <input type="date" name="tanggal_masuk" class="form-control" id="tanggal_masuk" placeholder="Masukkan Tanggal Masuk">
                        </div>
                        <div class="form-group">
                            <label for="waktu_masuk">Waktu Masuk</label>
                            <input type="time" name="waktu_masuk" class="form-control" id="waktu_masuk" placeholder="Masukkan Waktu Masuk">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_keluar">Tanggal Keluar</label>
                            <input type="date" name="tanggal_keluar" class="form-control" id="tanggal_keluar" placeholder="Masukkan Tanggal Keluar">
                        </div>
                        <div class="form-group">
                            <label for="waktu_keluar">Waktu Keluar</label>
                            <input type="time" name="waktu_keluar" class="form-control" id="waktu_keluar" placeholder="Masukkan Waktu Keluar">
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
                            <label for="status">Status Transaksi</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">Pilih Status Transaksi</option>
                                <option value="DP">DP</option>
                                <option value="Lunas">Lunas</option>
                            </select>
                        </div>
                        <div class="form-group" id="grupket">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="keterangan" rows="3" placeholder="Keterangan"></textarea>
                        </div>

                        <div class="form-group">
                            <a href="<?= base_url('Hotel') ?>" class="btn btn-danger">Tutup</a>
                            <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Cat Hotel</button>
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


<script>
    $(document).ready(function() {
        $('#ras').select2({
            placeholder: "Pilih Ras",
            allowClear: true // menambahkan opsi clear pada Select2
        });
    });

    $(document).ready(function() {
        $('#status').select2({
            placeholder: "Pilih Status Transaksi",
            allowClear: true // menambahkan opsi clear pada Select2
        });
    });
</script>