<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header justify-content-center">
                    Form Tambah Data Jasa
                </div>

                <div class="card-body">
                    <form action="<?= base_url('Jasa/upload'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama_jasa">Nama Jasa</label>
                            <input type="text" name="nama_jasa" class="form-control" id="nama_jasa" placeholder="Nama Jasa">
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" name="harga" class="form-control" id="harga" placeholder="Harga" value="<?= isset($harga) ? number_format($harga, 0, ',', '.') : ''; ?>">
                        </div>
                        <div class="form-group">
                            <a href="<?= base_url('Jasa') ?>" class="btn btn-danger">Tutup</a>
                            <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Jasa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>