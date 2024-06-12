<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row justify-content-center">
        <div class="col-md-8 mb-5">
            <div class="card">
                <div class="card-header justify-content-center">
                    Form Ubah Data Produk
                </div>
                <div class="card-body">
                    <form action="<?= base_url('Produk/update'); ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $produk['id_produk']; ?>">
                        <div class="form-group">
                            <label for="kode_produk">Kode Produk</label>
                            <input type="text" name="kode_produk" value="P<?= $random_string ?>" readonly class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nama_produk">Nama produk</label>
                            <input type="text" name="nama_produk" value="<?= $produk['nama_produk']; ?>" class="form-control" id="nama_produk" placeholder="Nama produk">
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <br>
                            <img src="<?= base_url('assets/img/produk/') . $produk['gambar']; ?>" style="width: 100px;">
                            <input type="file" name="gambar" class="form-control" id="gambar">
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number" name="stok" value="<?= $produk['stok']; ?>" class="form-control" id="stok" placeholder="Stok">
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <input type="text" name="kategori" value="<?= $produk['kategori']; ?>" class="form-control" id="kategori" placeholder="Kategori">
                        </div>
                        <div class="form-group">
                            <label for="modal">Modal</label>
                            <input type="text" name="modal" value="<?= $produk['modal']; ?>" class="form-control" id="modal" placeholder="Modal">
                        </div>
                        <div class="form-group">
                            <label for="harga_produk">Harga</label>
                            <input type="text" name="harga_produk" value="<?= $produk['harga']; ?>" class="form-control" id="harga_produk" placeholder="Harga">
                        </div>
                        <div class="form-group">
                            <a href="<?= base_url('Produk') ?>" class="btn btn-danger">Tutup</a>
                            <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data Produk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
