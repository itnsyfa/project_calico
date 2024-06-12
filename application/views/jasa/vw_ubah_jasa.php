<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header justify-content-center">
                    Form Ubah Data Jasa
                </div>
                <div class="card-body">
                    <form action="<?= base_url('Jasa/update'); ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $jasa['id_jasa']; ?>">
                        <div class="form-group">
                            <label for="nama">Nama Jasa</label>
                            <input type="text" name="nama_jasa" value="<?= $jasa['nama_jasa']; ?>" class="form-control" id="nama_jasa" placeholder="Nama Jasa">
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" name="harga" value="<?= $jasa['harga']; ?>" class="form-control" id="harga" placeholder="Harga">
                        </div>
                        <div class="form-group">
                            <a href="<?= base_url('jasa') ?>" class="btn btn-danger">Tutup</a>
                            <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data Jasa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>