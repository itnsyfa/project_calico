<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Penjualan</title>
    <style>
    body {
        width: 100%;
        max-width: 250px; /* Atur maksimum lebar kertas A8 */
        margin: 0 auto; /* Pusatkan struk di kertas */
        font-size: 7px; /* Sesuaikan ukuran font */
        font-family: 'Arial', sans-serif;
        margin-top: -30px; /* Geser ke atas sesuai kebutuhan */
        margin-bottom: -30px;
    }

    .content, .info-section {
        font-size: 7px; /* Sesuaikan ukuran font bagian konten */
        margin-bottom: 2px;
    }

    .title {
        text-align: center;
        font-size: 10px; /* Sesuaikan ukuran font judul */
        margin-bottom: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 7px; /* Sesuaikan ukuran font tabel */
    }

    th, td {
        padding: 2px; /* Sesuaikan padding untuk sel tabel */
        text-align: left;
    }

    .text-right {
        text-align: right;
    }

    hr {
        border: none;
        border-top: 1px solid #ccc;
        margin: 5px 0;
    }
    </style>

</head>

<body>
    <div class="container">
        <div class="struk-wrapper">
            <!-- Judul Struk -->
            <div class="title">
                <h2 class="h2 text-dark"><strong>Calico Petshop</strong></h2>
            </div>

            <!-- Informasi Transaksi -->
            <div class="content">
                <div class="info-section">
                    <div>No Penjualan:</div>
                    <div><strong><?= $transaksi->no_transaksi ?></strong></div>
                </div>
                <div class="info-section">
                    <div>Nama Kasir:</div>
                    <div><strong><?= $transaksi->nama_kasir ?></strong></div>
                </div>
                <div class="info-section">
                    <div>Waktu Penjualan:</div>
                    <div><strong><?= $transaksi->tgl_penjualan ?> - <?= $transaksi->jam_penjualan ?></strong></div>
                </div>
            </div>

            <hr>

            <!-- Detail Penjualan -->
            <table>
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Harga</th>
                        <th scope="col" class="text-right">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($all_detail_penjualan as $detail_penjualan) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $detail_penjualan->nama_produk ?></td>
                            <td><?= $detail_penjualan->jumlah_produk ?> <?= strtoupper($detail_penjualan->satuan) ?></td>
                            <td><?= number_format($detail_penjualan->harga, 0, ',', '.') ?></td>
                            <td class="text-right"><?= number_format($detail_penjualan->sub_total, 0, ',', '.') ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

            <hr>

            <!-- Total Penjualan -->
            <div class="content">
                <div class="text-right"><strong>Total : Rp <?= number_format($transaksi->total, 0, ',', '.') ?></strong></div>
            </div>
        </div>
    </div>

</body>

</html>
