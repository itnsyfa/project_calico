<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row justify-content-center">
        <div class="col-md-8 mb-5">
            <div class="card">
                <div class="card-header justify-content-center">
                    Form Ubah Data Hewan
                </div>
                <div class="card-body">
                    <form action="<?= base_url('Hewan/update'); ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $hewan['id_hewan']; ?>">
                        <div class="form-group">
                            <label for="nama">Nama Hewan</label>
                            <input type="text" name="nama_hewan" value="<?= $hewan['nama_hewan']; ?>" class="form-control" id="nama_hewan" placeholder="Nama Hewan">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Pemilik</label>
                            <input type="text" name="nama_pemilik" value="<?= $hewan['nama_pemilik']; ?>" class="form-control" id="nama_pemilik" placeholder="Nama Pemilik">
                        </div>
                        <div class="form-group">
                            <label for="spesies">Spesies</label>
                            <input type="text" name="spesies" value="<?= $hewan['spesies']; ?>" class="form-control" id="spesies" placeholder="Spesies">
                        </div>
                        <div class="form-group">
                            <label for="ras">Ras</label>
                            <input type="text" name="ras" value="<?= $hewan['ras']; ?>" class="form-control" id="ras" placeholder="Ras">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <input type="text" name="jenis_kelamin" value="<?= $hewan['jenis_kelamin']; ?>" class="form-control" id="jenis_kelamin" placeholder="Jenis Kelamin">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" value="<?= $hewan['alamat']; ?>" class="form-control" id="alamat" placeholder="alamat">
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No Hp</label>
                            <input type="text" name="no_hp" value="<?= $hewan['no_hp']; ?>" class="form-control" id="no_hp" placeholder="No Hp">
                        </div>
                        <div class="form-group">
                            <a href="<?= base_url('hewan') ?>" class="btn btn-danger">Tutup</a>
                            <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data Hewan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>