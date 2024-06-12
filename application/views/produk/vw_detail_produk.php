<!-- Container putih -->
<div class="container-fluid bg-white p-3">
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Detail Produk
                </div>
                <div class="card-body">
                    <h2 class="card-title"><?= $produk['nama_produk']; ?></h2>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="<?= base_url('assets/img/produk/') . $produk['gambar']; ?>" style="width:500px; margin-right:500px; " class="img-thumbnail">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Kode Produk</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6"><?= $produk['nama_produk']; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Nama Produk</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6"><?= $produk['nama_produk']; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Stok</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6"><?= $produk['stok']; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Kategori</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6"><?= $produk['kategori']; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Modal</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6"><?= $produk['modal']; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Harga</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6"><?= $produk['harga_produk']; ?></div>
                    </div>

                    


                </div>
                <div class="card-footer justify-content-center">
                    <a href="<?= base_url('Produk/') ?>" class="btn btn-danger">Tutup</a>
                </div>
            </div>
        </div>

    </div>
</div>

</div>
</div>