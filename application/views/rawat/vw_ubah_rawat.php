<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row justify-content-center">
        <div class="col-md-8 mb-5">
            <div class="card">
                <div class="card-header justify-content-center">
                    Form Ubah Data Rawat
                </div>

                <div class="card-body">
                    <form action="<?= base_url('Rawat/update'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="perawatan">Perawatan</label>
                            <select name="perawatan" id="perawatan" class="form-control">
                                <option value="">Pilih Perawatan</option>
                                <option value="Rawat Inap" <?= $rawat['perawatan'] == 'Rawat Inap' ? 'selected' : ''; ?>>Rawat Inap</option>
                                <option value="Rawat Jalan" <?= $rawat['perawatan'] == 'Rawat Jalan' ? 'selected' : ''; ?>>Rawat Jalan</option>
                                <option value="Rujuk RS" <?= $rawat['perawatan'] == 'Rujuk RS' ? 'selected' : ''; ?>>Rujuk RS</option>
                            </select>
                        </div>
                        <!-- Menampilkan nama hewan dan informasi rawat sesuai dengan perawatan yang dipilih -->
                        <div class="form-group field-to-show" id="grupnama">
                            <div class="form-group">
                                <label for="kode_rawat">Kode Rawat</label>
                                <input type="text" name="id_rawat" value="<?= $rawat['id_rawat']; ?>" readonly class="form-control">
                            </div>
                            <label for="inNamaHewan">Nama Hewan</label>
                            <select class="form-control filled-input select2" name="inNamaHewan" id="inNamaHewan">
                                <option value="-">-</option>
                                <?php foreach ($list_hewan as $row) : ?>
                                    <option value="<?= $row['id_hewan']; ?>" <?= $rawat['id_hewan'] == $row['id_hewan'] ? 'selected' : ''; ?>><?= $row['nama_hewan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <!-- Menampilkan informasi rawat tergantung pada jenis perawatan -->
                        <div class="form-row field-to-show" id="grupmasuk">
                            <div class="form-group col-md-6">
                                <label for="tanggal_masuk">Tanggal Masuk</label>
                                <input type="date" name="tanggal_masuk" class="form-control" id="tanggal_masuk" placeholder="Tanggal Masuk" value="<?= $rawat['tanggal_masuk']; ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="diagnosa">Diagnosa</label>
                                <input type="text" name="diagnosa" class="form-control" id="diagnosa" placeholder="Diagnosa" value="<?= $rawat['diagnosa']; ?>">
                            </div>
                        </div>
                        <!-- Menampilkan informasi berat badan dan suhu tubuh hewan -->
                        <div class="form-row field-to-show" id="grupbb">
                            <div class="form-group col-md-6">
                                <label for="berat_badan">Berat Badan</label>
                                <div class="input-group">
                                    <input type="text" name="berat_badan" class="form-control" id="berat_badan" placeholder="Masukkan berat badan hewan Anda" value="<?= $rawat['berat_badan']; ?>">
                                    <div class="input-group-append">
                                        <span class="input-group-text">kg</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="suhu_tubuh">Suhu Tubuh</label>
                                <div class="input-group">
                                    <input type="text" name="suhu_badan" class="form-control" id="suhu_badan" placeholder="Masukkan suhu tubuh hewan Anda" value="<?= $rawat['suhu_badan']; ?>">
                                    <div class="input-group-append">
                                        <span class="input-group-text">°C</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Menampilkan gejala klinis dan informasi pengobatan -->
                        <div class="form-group field-to-show" id="grupgejala">
                            <label for="gejala_klinis">Gejala Klinis</label>
                            <textarea class="form-control" name="gejala_klinis" id="gejala_klinis" rows="3" placeholder="Gejala klinis"><?= $rawat['gejala_klinis']; ?></textarea>
                        </div>
                        <div class="form-row field-to-show" id="grupdiberi">
                            <div class="form-group col-md-6">
                                <label for="tgl_diberi_obat">Tanggal Diberi Obat</label>
                                <input type="date" name="tgl_diberi_obat" class="form-control" id="tgl_diberi_obat" placeholder="Tanggal Diberi Obat" value="<?= $rawat['tgl_diberi_obat']; ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="waktu">Waktu</label>
                                <input type="time" name="waktu" class="form-control" id="waktu" placeholder="Waktu" value="<?= $rawat['waktu']; ?>">
                            </div>
                        </div>
                        <!-- Menampilkan keterangan dan pilihan terapi -->
                        <div class="form-group field-to-show" id="grupket">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="keterangan" rows="3" placeholder="Keterangan"><?= $rawat['keterangan']; ?></textarea>
                        </div>
                        <div class="form-row field-to-show" id="grupdokter">
                            <div class="form-group col-md-6">
                                <label for="dokter">Dokter</label>
                                <select name="dokter" id="dokter" class="form-control">
                                    <option value="">Pilih Dokter</option>
                                    <option value="Sri Handayani" <?= $rawat['dokter'] == 'Sri Handayani' ? 'selected' : ''; ?>>Sri Handayani</option>
                                    <option value="Eka Puspita" <?= $rawat['dokter'] == 'Eka Puspita' ? 'selected' : ''; ?>>Eka Puspita</option>

                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="therapy">Therapy</label>
                                <br>
                                <?php foreach ($therapies as $jasa) : ?>
                                    <div class="form-check">
                                        <input class="form-check-input therapy-checkbox" type="checkbox" name="therapy[]" id="therapy<?= $jasa['id_jasa']; ?>" value="<?= $jasa['id_jasa']; ?>" <?php if (in_array($jasa['id_jasa'], explode(', ', $rawat['therapy']))) echo 'checked'; ?>>
                                        <label class="form-check-label" for="therapy<?= $jasa['id_jasa']; ?>">
                                            <?= $jasa['nama_jasa']; ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="harga">Harga</label>
                                <input type="number" name="harga" class="form-control" id="harga" placeholder="harga" value="<?= $rawat['harga']; ?>" readonly>
                            </div>
                        </div>
                        <!-- Menampilkan status rawat dan tanggal keluar -->
                        <div class="form-row field-to-show" id="grupstatus">
                            <div class="form-group col-md-6">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">Pilih Status</option>
                                    <option value="Belum Diberi Obat" <?= $rawat['status'] == 'Belum Diberi Obat' ? 'selected' : ''; ?>>Belum Diberi Obat</option>
                                    <option value="Sudah Diberi Obat" <?= $rawat['status'] == 'Sudah Diberi Obat' ? 'selected' : ''; ?>>Sudah Diberi Obat</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tanggal_keluar">Tanggal Keluar</label>
                                <input type="date" name="tanggal_keluar" class="form-control" id="tanggal_keluar" placeholder="Tanggal Keluar" value="<?= $rawat['tanggal_keluar']; ?>">
                            </div>
                        </div>
                        <!-- Tombol untuk menutup form atau menyimpan perubahan -->
                        <div class="form-group">
                            <a href="<?= base_url('Rawat') ?>" class="btn btn-danger">Tutup</a>
                            <button type="submit" name="ubah" class="btn btn-primary float-right">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Fungsi untuk menampilkan dan menyembunyikan field berdasarkan jenis perawatan
        $('#perawatan').change(function() {
            var perawatan = $(this).val();

            $('.field-to-show').hide();

            if (perawatan === "Rawat Inap") {
                $('#grupnama').show();
                $('#grupmasuk').show();
                $('#grupdiagnosa').show();
                $('#grupbb').show();
                $('#grupsuhu').show();
                $('#grupgejala').show();
                $('#grupdokter').show();
                $('#grupdiberi').show();
                $('#grupwaktu').show();
                $('#grupket').show();
                $('#grupjasa').show();
                $('#grupstatus').show();
                $('#grupkeluar').show();
            } else if (perawatan === "Rawat Jalan" || perawatan === "Rujuk RS") {
                $('#grupnama').show();
                $('#grupmasuk').show();
                $('#grupbb').show();
                $('#grupsuhu').show();
                $('#grupgejala').show();
                $('#grupdiagnosa').show();
                $('#grupjasa').show();
                $('#grupdokter').show();
                $('#grupket').show();
                $('#grupdiberi').hide();
                $('#grupwaktu').hide();
                $('#grupstatus').hide();
                $('#grupkeluar').hide();
            }
        });

        // Fungsi untuk menghitung total harga terapi yang dipilih
        $('.therapy-checkbox').change(function() {
            var totalHarga = 0;

            $('.therapy-checkbox:checked').each(function() {
                var id_jasa = $(this).val();
                $.ajax({
                    url: '<?= base_url('Rawat/get_jasa_harga'); ?>',
                    type: 'POST',
                    data: {
                        id_jasa: id_jasa
                    },
                    dataType: 'json',
                    success: function(data) {
                        totalHarga += parseInt(data.harga);
                        $('#harga').val(totalHarga);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        // Handle error jika ada
                    }
                });
            });
        });
    });
</script>