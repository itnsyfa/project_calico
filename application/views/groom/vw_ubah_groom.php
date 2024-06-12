<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header justify-content-center">
                    Form Ubah Data Grooming
                </div>
                <div class="card-body">
                    <form action="<?= base_url('Grooming/update'); ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $groom['id_groom']; ?>">
                        <div class="form-group">
                            <label for="nama">Nama Pemilik</label>
                            <input type="text" name="nama_pemilik" value="<?= $groom['nama_pemilik']; ?>" class="form-control" id="nama_pemilik" placeholder="Nama Pemilik">
                        </div>
                        <div class="form-group">
                            <label for="nama">Tanggal</label>
                            <input type="date" name="tanggal" value="<?= $groom['tanggal']; ?>" class="form-control" id="tanggal" placeholder="Tanggal">
                        </div>
                        <div class="form-group">
                            <label for="spesies">Qty</label>
                            <input type="number" name="qty" value="<?= $groom['qty']; ?>" class="form-control" id="qty" placeholder="Jumlah Hewan">
                        </div>
                        <div class="form-group field-to-show" id="grupjasa">
                            <label for="inNamaJasa">Jenis Grooming</label>
                            <select class="form-control filled-input select2" name="inNamaJasa" id="inNamaJasa">
                                <option value="-">-</option>
                                <?php foreach ($list_jasa as $row) : ?>
                                    <option value="<?= $row['id_jasa']; ?>" <?= $groom['id_jasa'] == $row['id_jasa'] ? 'selected' : ''; ?>><?= $row['nama_jasa']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No Hp</label>
                            <input type="text" name="no_hp" value="<?= $groom['no_hp']; ?>" class="form-control" id="no_hp" placeholder="No Hp">
                        </div>
                        <div class="form-group field-to-show" id="grupket">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="keterangan" rows="3" placeholder="Keterangan"><?= $groom['keterangan']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" name="harga" class="form-control" id="harga" placeholder="harga" value="<?= $groom['harga_groom']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <a href="<?= base_url('Grooming') ?>" class="btn btn-danger">Tutup</a>
                            <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data Grooming</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<script>
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
            data: { id_jasa: id_jasa },
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