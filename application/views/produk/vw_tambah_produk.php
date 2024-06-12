<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header justify-content-center">
                    Form Tambah Data Produk
                </div>

                <div class="card-body">
                    <form action="<?= base_url('Produk/upload'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="kode_produk">Kode Produk</label>
                            <input type="text" name="kode_produk" value="P<?= $random_string ?>" readonly class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nama_produk">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control" id="nama_produk" placeholder="Nama Produk">
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar</label><br>
                            <input type="file" name="gambar" class="form_control" id="gambar" placeholder="Gambar">
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number" name="stok" class="form-control" id="stok" placeholder="Stok" min="0" step="1">
                        </div>
                        <div class="form-group">
                            <label for="satuan">Satuan</label>
                            <select name="satuan" id="satuan" class="form-control">
                                <option value="">Satuan</option>
                                <option value="Karung">Karung</option>
                                <option value="Sachet">Sachet</option>
                                <option value="Botol">Botol</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select name="kategori" id="kategori" class="form-control">
                                <option value="">Kategori</option>
                                <option value="Makanan">Makanan</option>
                                <option value="Accessoris">Accessoris</option>
                                <option value="Obat">Obat</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="modal">Modal</label>
                            <input type="text" name="modal" class="form-control" id="modal" placeholder="Modal" value="<?= isset($harga) ? number_format($harga, 0, ',', '.') : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" name="harga" class="form-control" id="harga" placeholder="Harga" value="<?= isset($harga) ? number_format($harga, 0, ',', '.') : ''; ?>">
                        </div>

                        <div class="form-group">
                            <a href="<?= base_url('Produk') ?>" class="btn btn-danger">Tutup</a>
                            <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Produk</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>