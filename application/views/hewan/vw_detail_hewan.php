<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Detail Data Hewan
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">Nama Hewan</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6"><?= $hewan['nama_hewan']; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Nama Pemilik</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6"><?= $hewan['nama_pemilik']; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Spesies</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6"><?= $hewan['spesies']; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Ras</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6"><?= $hewan['ras']; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Jenis Kelamin</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6"><?= $hewan['jenis_kelamin']; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Alamat</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6"><?= $hewan['alamat']; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">No HP</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6"><?= $hewan['no_hp']; ?></div>
                    </div>

                    


                </div>
                <div class="card-footer justify-content-center">
                    <a href="<?= base_url('Hewan') ?>" class="btn btn-danger">Tutup</a>
                </div>
            </div>
        </div>

    </div>
</div>

</div>