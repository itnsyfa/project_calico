<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row justify-content-center">
        <div class="col-md-8 mb-5">
            <div class="card">
                <div class="card-header justify-content-center">
                    Form Tambah Data Rawat
                </div>

                <div class="card-body">
                    <form action="<?= base_url('Rawat/upload'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="perawatan">Perawatan</label>
                            <select name="perawatan" id="perawatan" class="form-control">
                                <option value="">Pilih Perawatan</option>
                                <option value="Rawat Inap">Rawat Inap</option>
                                <option value="Rawat Jalan">Rawat Jalan</option>
                                <option value="Rujuk RS">Rujuk RS</option>
                            </select>
                        </div>
                        <div class="form-group" id="grupnama">
                            <label for="inNamaHewan">Nama Hewan</label>
                            <select class="form-control filled-input select2" name="inNamaHewan" id="inNamaHewan">
                                <option value="-">-</option>
                                <?php foreach ($list_hewan as $row) : ?>
                                    <option value="<?= $row['id_hewan']; ?>"><?= $row['nama_hewan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6" id="grupmasuk">
                                <label for="tanggal_masuk">Tanggal Masuk</label>
                                <input type="date" name="tanggal_masuk" class="form-control" id="tanggal_masuk" placeholder="Tanggal Masuk">
                            </div>
                            <div class="form-group col-md-6" id="grupdiagnosa">
                                <label for="diagnosa">Diagnosa</label>
                                <input type="text" name="diagnosa" class="form-control" id="diagnosa" placeholder="Diagnosa">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6" id="grupbb">
                                <label for="berat_badan">Berat Badan</label>
                                <div class="input-group">
                                    <input type="text" name="berat_badan" class="form-control" id="berat_badan" placeholder="Masukkan berat badan hewan Anda">
                                    <div class="input-group-append">
                                        <span class="input-group-text">kg</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6" id="grupsuhu">
                                <label for="suhu_tubuh">Suhu Tubuh</label>
                                <div class="input-group">
                                    <input type="text" name="suhu_badan" class="form-control" id="suhu_badan" placeholder="Masukkan suhu tubuh hewan Anda">
                                    <div class="input-group-append">
                                        <span class="input-group-text">°C</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="grupgejala">
                            <label for="gejala_klinis">Gejala Klinis</label>
                            <textarea class="form-control" name="gejala_klinis" id="gejala_klinis" rows="3" placeholder="Gejala klinis"></textarea>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6" id="grupdiberi">
                                <label for="tgl_diberi_obat">Tanggal Diberi Obat</label>
                                <input type="date" name="tgl_diberi_obat" class="form-control" id="tgl_diberi_obat" placeholder="Tanggal Diberi Obat">
                            </div>

                            <div class="form-group col-md-6" id="grupwaktu">
                                <label for="waktu">Waktu</label>
                                <input type="time" name="waktu" class="form-control" id="waktu" placeholder="Waktu">
                            </div>
                        </div>
                        <div class="form-group" id="grupket">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="keterangan" rows="3" placeholder="Keterangan"></textarea>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6" id="grupdokter">
                                <label for="dokter">Dokter</label>
                                <select name="dokter" id="dokter" class="form-control">
                                    <option value="">Pilih Dokter</option>
                                    <option value="Sri Handayani"> Sri Handayani</option>
                                    <option value="Eka Puspita">Eka Puspita</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6" id="grupjasa">
                                <label>Therapy</label><br>
                                <?php foreach ($therapies as $jasa) : ?>
                                    <div class="form-check">
                                        <input class="form-check-input jasa-checkbox" type="checkbox" name="jasa[]" id="jasa<?= $jasa['id_jasa']; ?>" value="<?= $jasa['id_jasa']; ?>">
                                        <label class="form-check-label" for="jasa<?= $jasa['id_jasa']; ?>">
                                            <?= $jasa['nama_jasa']; ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="form-group col-md-6" id="grupharga">
                                <label for="harga">Harga</label>
                                <input type="number" name="harga" class="form-control" id="harga" placeholder="" readonly>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6" id="grupstatus">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">Pilih Status</option>
                                    <option value="Belum Diberi Obat"> Belum Diberi Obat</option>
                                    <option value="Sudah Diberi Obat">Sudah Diberi Obat</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6" id="grupkeluar">
                                <label for="tanggal_keluar">Tanggal Keluar</label>
                                <input type="date" name="tanggal_keluar" class="form-control" id="tanggal_keluar" placeholder="Tanggal Keluar">
                            </div>

                        </div>
                        <div class="form-group">
                            <a href="<?= base_url('Rawat') ?>" class="btn btn-danger">Tutup</a>
                            <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Rawat</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>
</div>
</div>
</div>
</div>

<script>
    $(document).ready(function() {
        $('#perawatan').change(function() {
            var perawatan = $(this).val();

            // Semua field disembunyikan terlebih dahulu
            $('.field-to-show').hide();

            // Tampilkan field sesuai dengan pilihan perawatan
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

        // Script untuk menghitung harga dari jasa-jasa yang dipilih
        $('.jasa-checkbox').change(function() {
            var totalHarga = 0;

            // Loop melalui setiap checkbox untuk menghitung total harga
            $('.jasa-checkbox:checked').each(function() {
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

                        // Tampilkan total harga di input harga setelah semua request AJAX selesai
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