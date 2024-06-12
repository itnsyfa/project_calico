<div class="container-fluid">
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content" data-url="<?= base_url('Transaksi') ?>">

            <div class="container-fluid">
                <div class="clearfix">
                    <div class="float-left">
                        <h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
                    </div>
                    <div class="float-right">
                        <a href="<?= base_url('Transaksi/export_detail/' . $transaksi->no_transaksi) ?>" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf"></i>&nbsp;&nbsp;Export</a>
                        <a href="<?= base_url('Transaksi') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
                    </div>

                </div>
                <hr>
                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('success') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php elseif ($this->session->flashdata('error')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('error') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif ?>
                <div class="card shadow mb-5">
                    <div class="card-header"><strong>Detail Penjualan - <?= $transaksi->no_transaksi ?></strong></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-borderless">
                                    <tr>
                                        <td><strong>No Penjualan</strong></td>
                                        <td>:</td>
                                        <td><?= $transaksi->no_transaksi ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Nama Kasir</strong></td>
                                        <td>:</td>
                                        <td><?= $transaksi->nama_kasir ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Waktu Penjualan</strong></td>
                                        <td>:</td>
                                        <td><?= $transaksi->tgl_penjualan ?> - <?= $transaksi->jam_penjualan ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td><strong>No</strong></td>
                                            <td><strong>Nama</strong></td>
                                            <td><strong>Harga</strong></td>
                                            <td><strong>Jumlah</strong></td>
                                            <td><strong>Sub Total</strong></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($all_detail_penjualan as $detail_penjualan) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $detail_penjualan->nama_produk ?></td>
                                                <td>Rp <?= number_format($detail_penjualan->harga, 0, ',', '.') ?></td>
                                                <td><?= $detail_penjualan->jumlah_produk ?> <?= strtoupper($detail_penjualan->satuan) ?></td>
                                                <td>Rp <?= number_format($detail_penjualan->sub_total, 0, ',', '.') ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4" align="right"><strong>Total : </strong></td>
                                            <td>Rp <?= number_format($transaksi->total, 0, ',', '.') ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>