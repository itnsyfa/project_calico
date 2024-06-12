<!-- Begin Page Content -->
<div class="container-fluid">
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content" data-url="<?= base_url('Transaksi') ?>">
            <!-- load Topbar -->

            <div class="container-fluid">
                <div class="clearfix">
                    <div class="float-left">
                        <h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
                    </div>
                    <div class="float-right">
                        <a href="<?= base_url('Transaksi') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <div class="card shadow mb-5">
                            <div class="card-header"><strong>Isi Form Dibawah Ini!</strong></div>
                            <div class="card-body">
                                <form action="<?= base_url('Transaksi/proses_tambah') ?>" id="form-tambah" method="POST">
                                    <h5>Data Kasir</h5>
                                    <hr>
                                    <div class="form-row">
                                        <div class="form-group col-2">
                                            <label>No. Penjualan</label>
                                            <input type="text" name="no_transaksi" value="PJ<?= time() ?>" readonly class="form-control">
                                        </div>
                                        <div class="form-group col-3">
                                            <label>Nama Kasir</label>
                                            <input type="text" name="nama_kasir" value="<?= $this->session->auth['nama_users'] ?>" readonly class="form-control">
                                        </div>
                                        <div class="form-group col-2">
                                            <label>Tanggal Penjualan</label>
                                            <input type="text" name="tgl_penjualan" value="<?= date('d/m/Y') ?>" readonly class="form-control">
                                        </div>
                                        <div class="form-group col-2">
                                            <label>Jam</label>
                                            <input type="text" name="jam_penjualan" value="<?= date('H:i:s') ?>" readonly class="form-control">
                                        </div>
                                    </div>
                                    <h5>Data Rawat</h5>
                                    <hr>
                                    <div class="form-row">
                                        <div class="form-group col-3">
                                            <label for="kode_rawat">Kode Rawat</label>
                                            <select name="kode_rawat" id="kode_rawat" class="form-control">
                                                <option value="">Pilih Rawat</option>
                                                <?php foreach ($all_rawat as $rawat) : ?>
                                                    <option value="<?= $rawat->id_rawat ?>"><?= $rawat->id_rawat ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-2">
                                            <label>Nama Hewan</label>
                                            <input type="text" name="nama_hewan" value="" readonly class="form-control">
                                        </div>
                                        <div class="form-group col-2">
                                            <label>Perawatan</label>
                                            <input type="text" name="perawatan" value="" readonly class="form-control">
                                        </div>
                                        <div class="form-group col-2">
                                            <label>Therapy</label>
                                            <input type="text" name="therapy" value="" readonly class="form-control">
                                        </div>
                                        <div class="form-group col-2">
                                            <label>Harga Rawat</label>
                                            <input type="text" name="harga" value="" readonly class="form-control">
                                        </div>
                                        <div class="form-group col-1">
                                            <label for="">&nbsp;</label>
                                            <button disabled type="button" class="btn btn-primary btn-block" id="tambahrawat"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <h5>Data Barang</h5>
                                    <hr>
                                    <!-- Form Data Barang -->
                                    <div class="form-row">
                                        <div class="form-group col-3">
                                            <label for="nama_produk">Nama Produk</label>
                                            <select name="nama_produk" id="nama_produk" class="form-control">
                                                <option value="">Pilih Barang</option>
                                                <?php foreach ($all_barang as $produk) : ?>
                                                    <option value="<?= $produk->nama_produk ?>"><?= $produk->nama_produk ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-2">
                                            <label>Kode Produk</label>
                                            <input type="text" name="kode_produk" value="" readonly class="form-control">
                                        </div>
                                        <div class="form-group col-2">
                                            <label>Harga Produk</label>
                                            <input type="text" name="harga_produk" value="" readonly class="form-control">
                                        </div>
                                        <div class="form-group col-2">
                                            <label>Jumlah</label>
                                            <input type="number" name="jumlah" value="" class="form-control" readonly min='1'>
                                        </div>
                                        <div class="form-group col-2">
                                            <label>Sub Total</label>
                                            <input type="number" name="sub_total" value="" class="form-control" readonly>
                                        </div>
                                        <div class="form-group col-1">
                                            <label for="">&nbsp;</label>
                                            <button disabled type="button" class="btn btn-primary btn-block" id="tambah"><i class="fa fa-plus"></i></button>
                                        </div>
                                        <input type="hidden" name="satuan" value="">
                                    </div>
                                    <h5>Data Grooming</h5>
                                    <hr>
                                    <div class="form-row">
                                        <div class="form-group col-3">
                                            <label for="kode_groom">Kode Grooming</label>
                                            <select name="kode_groom" id="kode_groom" class="form-control">
                                                <option value="">Pilih Kode Grooming</option>
                                                <?php foreach ($all_groom as $groom) : ?>
                                                    <option value="<?= $groom->id_groom ?>"><?= $groom->id_groom ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-3">
                                            <label>Nama Pemilik</label>
                                            <input type="text" name="nama_pemilik" value="" class="form-control" readonly>
                                        </div>
                                        <div class="form-group col-2">
                                            <label>Qty</label>
                                            <input type="number" name="qty" value="" class="form-control" readonly>
                                        </div>
                                        <div class="form-group col-3">
                                            <label>Harga Grooming</label>
                                            <input type="text" name="harga_groom" value="" class="form-control" readonly>
                                        </div>
                                        <div class="form-group col-1">
                                            <label for="">&nbsp;</label>
                                            <button disabled type="button" class="btn btn-primary btn-block" id="tambahgroom"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>

                                    <h5>Data Cat Hotel</h5>
                                    <hr>
                                    <div class="form-row">
                                        <div class="form-group col-3">
                                            <label for="id_jasa">Cat Hotel</label>
                                            <select name="id_jasa" id="id_jasa" class="form-control">
                                                <option value="">Pilih Jasa Cat Hotel</option>
                                                <?php foreach ($all_jasa as $jasa) : ?>
                                                    <option value="<?= $jasa->id_jasa ?>"><?= $jasa->nama_jasa ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-2">
                                            <label>Nama Jasa</label>
                                            <input type="text" name="nama_jasa" value="" class="form-control" readonly>
                                        </div>
                                        <div class="form-group col-2">
                                            <label>Jumlah</label>
                                            <input type="number" name="jumlah_hotel" value="" class="form-control" min='1'>
                                        </div>
                                        <div class="form-group col-2">
                                            <label>Harga Jasa</label>
                                            <input type="text" name="harga_jasa" value="" class="form-control" readonly>
                                        </div>
                                        <div class="form-group col-2">
                                            <label>Sub Total</label>
                                            <input type="number" name="sub_total_hotel" value="" class="form-control" readonly>
                                        </div>
                                        <div class="form-group col-1">
                                            <label for="">&nbsp;</label>
                                            <button disabled type="button" class="btn btn-primary btn-block" id="tambahhotel"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>

                                    <div class="keranjang">
                                        <h5>Detail Pembelian</h5>
                                        <hr>
                                        <table class="table table-bordered" id="keranjang">
                                            <thead>
                                                <tr>
                                                    <td width="35%">Nama</td>
                                                    <td width="15%">Harga</td>
                                                    <td width="10%">Jumlah</td>
                                                    <td width="10%">Satuan</td>
                                                    <td width="10%">Sub Total</td>
                                                    <td width="10%">Aksi</td>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="4" align="right"><strong>Total : </strong></td>
                                                    <td id="total"></td>

                                                    <td>
                                                        <input type="hidden" name="total_hidden" value="">
                                                        <input type="hidden" name="max_hidden" value="">
                                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
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
<!-- End of Main Content -->

<script>
    $(document).ready(function() {
        $('tfoot').hide();

        $(document).keypress(function(event) {
            if (event.which == '13') {
                event.preventDefault();
            }
        });

        $('#kode_rawat').on('change', function() {
            if ($(this).val() == '') resetRawat();
            else {
                const kode_rawat = $(this).val();
                const url_get_data_rawat = '<?= base_url('transaksi/get_data_rawat/') ?>' + kode_rawat;

                $.ajax({
                    url: url_get_data_rawat,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        kode_rawat: kode_rawat
                    },
                    success: function(data) {
                        $('input[name="nama_hewan"]').val(data.nama_hewan);
                        $('input[name="perawatan"]').val(data.perawatan);

                        // Process jasa_details to get nama_jasa separated by commas
                        var therapyNames = data.jasa_details.map(function(jasa) {
                            return jasa.nama_jasa;
                        }).join(', ');

                        // Set the value of therapy input
                        $('input[name="therapy"]').val(therapyNames);
                        $('input[name="harga"]').val(data.harga);
                        $('button#tambahrawat').prop('disabled', false);
                    },
                    error: function(xhr, status, error) {
                        console.error('Terjadi kesalahan:', xhr.responseText);
                    }
                });
            }
        });

        $('#id_jasa').on('change', function() {
            if ($(this).val() == '') resetHotel();
            else {
                const id_jasa = $(this).val();
                const url_get_jasa_by_id = '<?= base_url('transaksi/get_jasa_by_id/') ?>' + id_jasa;

                $.ajax({
                    url: url_get_jasa_by_id,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        id_jasa: id_jasa
                    },
                    success: function(data) {
                        $('input[name="nama_jasa"]').val(data.nama_jasa);
                        $('input[name="jumlah_hotel"]').val(1);
                        $('input[name="harga_jasa"]').val(data.harga);
                        $('button#tambahhotel').prop('disabled', false);
                        $('input[name="sub_total_hotel"]').val($('input[name="jumlah_hotel"]').val() * $('input[name="harga_jasa"]').val());

                        // Mengupdate sub total saat jumlah diubah
                        $('input[name="jumlah_hotel"]').on('input', function() {
                            $('input[name="sub_total_hotel"]').val($('input[name="jumlah_hotel"]').val() * $('input[name="harga_jasa"]').val());
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Terjadi kesalahan:', xhr.responseText);
                    }
                });
            }
        });

        $('#kode_groom').on('change', function() {
            if ($(this).val() == '') resetGroom();
            else {
                const kode_groom = $(this).val();
                const url_get_data_groom = '<?= base_url('transaksi/get_data_groom/') ?>' + kode_groom;

                $.ajax({
                    url: url_get_data_groom,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        kode_groom: kode_groom
                    },
                    success: function(data) {
                        $('input[name="nama_pemilik"]').val(data.nama_pemilik);
                        $('input[name="qty"]').val(data.qty);
                        $('input[name="harga_groom"]').val(data.harga_groom);
                        $('button#tambahgroom').prop('disabled', false);
                    },
                    error: function(xhr, status, error) {
                        console.error('Terjadi kesalahan:', xhr.responseText);
                    }
                });
            }
        });


        $('#nama_produk').on('change', function() {
            if ($(this).val() == '') reset();
            else {
                const nama_produk = encodeURIComponent($(this).val()); // Encode nama produk
                const url_get_all_barang = '<?= base_url('transaksi/get_all_barang/') ?>' + nama_produk;

                $.ajax({
                    url: url_get_all_barang,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        nama_produk: $(this).val()
                    },
                    success: function(data) {
                        $('input[name="kode_produk"]').val(data.kode_produk);
                        $('input[name="harga_produk"]').val(data.harga);
                        $('input[name="jumlah"]').val(1);
                        $('input[name="satuan"]').val(data.satuan);
                        $('input[name="max_hidden"]').val(data.stok);
                        $('input[name="jumlah"]').prop('readonly', false);
                        $('button#tambah').prop('disabled', false);

                        // Menghitung sub total
                        $('input[name="sub_total"]').val($('input[name="jumlah"]').val() * $('input[name="harga_produk"]').val());

                        // Mengupdate sub total saat jumlah diubah
                        $('input[name="jumlah"]').on('input', function() {
                            $('input[name="sub_total"]').val($('input[name="jumlah"]').val() * $('input[name="harga_produk"]').val());
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Terjadi kesalahan:', xhr.responseText);
                    }
                });
            }
        });

        $(document).on('click', '#tambah', function(e) {
            var TrId = $(this).val(); // Anda perlu mendefinisikan nilai TrId dari suatu tempat
            var url_keranjang_barang = '<?= base_url('transaksi/keranjang_barang/') ?>' + TrId;
            const data_keranjang = {
                nama_produk: $('select[name="nama_produk"]').val(),
                harga_produk: $('input[name="harga_produk"]').val(),
                jumlah: $('input[name="jumlah"]').val(),
                satuan: $('input[name="satuan"]').val(),
                sub_total: $('input[name="sub_total"]').val(),
            };

            // Menangani stok yang tidak tersedia
            if (parseInt($('input[name="max_hidden"]').val()) <= parseInt(data_keranjang.jumlah)) {
                alert('Stok tidak tersedia! Stok tersedia: ' + parseInt($('input[name="max_hidden"]').val()));
            } else {
                $.ajax({
                    url: url_keranjang_barang,
                    type: 'POST',
                    data: data_keranjang,
                    success: function(data) {
                        if ($('select[name="nama_produk"]').val() == data_keranjang.nama_produk) $('option[value="' + data_keranjang.nama_produk + '"]').hide();
                        reset();

                        $('table#keranjang tbody').append(data);
                        $('tfoot').show();

                        $('#total').html('<strong>' + hitung_total() + '</strong>');
                        $('input[name="total_hidden"]').val(hitung_total());
                    },
                    error: function(xhr, status, error) {
                        console.error('Terjadi kesalahan:', xhr.responseText);
                    }
                });
            }
        });


        $(document).on('click', '#tambahrawat', function(e) {
            e.preventDefault();

            var kode_rawat = $('select[name="kode_rawat"]').val();
            var url_keranjang_rawat = '<?= base_url('transaksi/keranjang_barang/') ?>' + kode_rawat;
            var url_get_data_rawat = '<?= base_url('transaksi/get_data_rawat/') ?>' + kode_rawat;

            if (!kode_rawat) {
                console.error('Kode rawat tidak ditemukan.');
                return;
            }

            // Ambil data harga dari url_get_data_rawat
            $.ajax({
                url: url_get_data_rawat,
                type: 'POST',
                data: {
                    kode_rawat: kode_rawat
                },
                dataType: 'json',
                success: function(data) {
                    // Asumsikan data yang diterima adalah array of objects dengan struktur yang sesuai
                    var therapyDetails = data.jasa_details;

                    // Memproses jasa_details menjadi array data_keranjang
                    var data_keranjang = therapyDetails.map(function(jasa) {
                        return {
                            nama_produk: jasa.nama_jasa,
                            harga_produk: jasa.harga,
                            satuan: '',
                            sub_total: jasa.harga
                        };
                    });

                    // Kirim request AJAX untuk setiap item di data_keranjang
                    data_keranjang.forEach(function(item) {
                        $.ajax({
                            url: url_keranjang_rawat,
                            type: 'POST',
                            data: item,
                            success: function(data) {
                                // Tambahkan logika sukses untuk menambahkan rawat ke keranjang di sini
                                resetRawat(); // Reset input untuk rawat setelah ditambahkan ke keranjang

                                $('table#keranjang tbody').append(data);
                                $('tfoot').show();

                                $('#total').html('<strong>' + hitung_total() + '</strong>');
                                $('input[name="total_hidden"]').val(hitung_total());
                            },
                            error: function(xhr, status, error) {
                                console.error('Terjadi kesalahan:', xhr.responseText);
                            }
                        });
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Terjadi kesalahan saat mengambil data rawat:', xhr.responseText);
                }
            });
        });

        $(document).on('click', '#tambahgroom', function(e) {
            e.preventDefault();

            var kode_groom = $('select[name="kode_groom"]').val();
            var url_keranjang_groom = '<?= base_url('transaksi/keranjang_barang/') ?>' + kode_groom;
            var url_get_data_groom = '<?= base_url('transaksi/get_data_groom/') ?>' + kode_groom;

            if (!kode_groom) {
                console.error('Kode groom tidak ditemukan.');
                return;
            }

            // Ambil data groom dari url_get_data_groom
            $.ajax({
                url: url_get_data_groom,
                type: 'POST',
                data: {
                    kode_groom: kode_groom
                },
                dataType: 'json',
                success: function(data) {
                    // Memproses groom_details menjadi array data_keranjang
                    var data_keranjang = [{
                        nama_produk: data.nama_pemilik,
                        harga_produk: data.harga_groom,
                        jumlah: data.qty,
                        satuan: '',
                        sub_total: data.harga_groom
                    }];

                    // Kirim request AJAX untuk setiap item di data_keranjang
                    data_keranjang.forEach(function(item) {
                        $.ajax({
                            url: url_keranjang_groom,
                            type: 'POST',
                            data: item,
                            success: function(data) {
                                // Tambahkan logika sukses untuk menambahkan groom ke keranjang di sini
                                resetGroom(); // Reset input untuk groom setelah ditambahkan ke keranjang

                                $('table#keranjang tbody').append(data);
                                $('tfoot').show();

                                $('#total').html('<strong>' + hitung_total() + '</strong>');
                                $('input[name="total_hidden"]').val(hitung_total());
                            },
                            error: function(xhr, status, error) {
                                console.error('Terjadi kesalahan:', xhr.responseText);
                            }
                        });
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Terjadi kesalahan saat mengambil data groom:', xhr.responseText);
                }
            });
        });



        $(document).on('click', '#tambahhotel', function(e) {
            e.preventDefault();

            var id_jasa = $('select[name="id_jasa"]').val();
            var jumlah_hotel = parseInt($('input[name="jumlah_hotel"]').val()); // Ambil nilai jumlah hotel dari input

            // Pastikan kedua nilai tersebut ada sebelum melanjutkan
            if (!id_jasa || isNaN(jumlah_hotel)) {
                console.error('Pastikan Anda telah memilih jasa dan memasukkan jumlah hotel.');
                return;
            }

            var url_keranjang_hotel = '<?= base_url('transaksi/keranjang_barang/') ?>' + id_jasa;
            var url_get_jasa_by_id = '<?= base_url('transaksi/get_jasa_by_id/') ?>' + id_jasa;

            $.ajax({
                url: url_get_jasa_by_id,
                type: 'POST',
                data: {
                    id_jasa: id_jasa
                },
                dataType: 'json',
                success: function(data) {
                    var data_keranjang = [{
                        nama_produk: data.nama_jasa,
                        harga_produk: data.harga,
                        jumlah: jumlah_hotel, // Gunakan nilai jumlah hotel yang telah diambil
                        satuan: '',
                        sub_total: data.harga * jumlah_hotel
                    }];

                    data_keranjang.forEach(function(item) {
                        $.ajax({
                            url: url_keranjang_hotel,
                            type: 'POST',
                            data: item,
                            success: function(data) {
                                resetHotel();

                                $('table#keranjang tbody').append(data);
                                $('tfoot').show();

                                $('#total').html('<strong>' + hitung_total() + '</strong>');
                                $('input[name="total_hidden"]').val(hitung_total());
                            },
                            error: function(xhr, status, error) {
                                console.error('Terjadi kesalahan:', xhr.responseText);
                            }
                        });
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Terjadi kesalahan saat mengambil data jasa:', xhr.responseText);
                }
            });
        });




        $(document).on('click', '#tombol-hapus', function() {
            $(this).closest('.row-keranjang').remove()

            $('option[value="' + $(this).data('nama-produk') + '"]').show()

            if ($('tbody').children().length == 0) $('tfoot').hide()
        })

        $('button[type="submit"]').on('click', function() {
            $('input[name="kode_produk"]').prop('disabled', true)
            $('select[name="nama_produk"]').prop('disabled', true)
            $('input[name="harga_produk"]').prop('disabled', true)
            $('input[name="jumlah"]').prop('disabled', true)
            $('input[name="sub_total"]').prop('disabled', true)
        })

        function hitung_total() {
            let total = 0;
            $('.sub_total').each(function() {
                total += parseInt($(this).text())
            })

            return total;
        }

        function reset() {
            $('#nama_produk').val('')
            $('input[name="kode_produk"]').val('')
            $('input[name="harga_produk"]').val('')
            $('input[name="jumlah"]').val('')
            $('input[name="sub_total"]').val('')
            $('input[name="jumlah"]').prop('readonly', true)
            $('button#tambah').prop('disabled', true)
        }

        function resetRawat() {
            $('#kode_rawat').val('')
            $('input[name="nama_hewan"]').val('')
            $('input[name="perawatan"]').val('')
            $('input[name="therapy"]').val('')
            $('input[name="sub_harga"]').val('')
            $('input[name="harga"]').val('')
            $('button#tambahrawat').prop('disabled', true)
        }

        function resetGroom() {
            $('#kode_groom').val('')
            $('input[name="nama_pemilik"]').val('')
            $('input[name="qty"]').val('')
            $('input[name="therapy"]').val('')
            $('input[name="sub_harga"]').val('')
            $('input[name="harga_groom"]').val('')
            $('button#tambahgroom').prop('disabled', true)
        }

        function resetHotel() {
            $('#id_jasa').val('')
            $('input[name="nama_jasa"]').val('')
            $('input[name="jumlah_hotel"]').val('')
            $('input[name="therapy"]').val('')
            $('input[name="sub_total_hotel"]').val('')
            $('input[name="harga_jasa"]').val('')
            $('button#tambahhotel').prop('disabled', true)
        }
    })
</script>