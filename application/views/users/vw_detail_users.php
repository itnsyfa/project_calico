<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Detail Users
                </div>
                <div class="card-body">
                    <h2 class="card-title"><?= $users['nama_users']; ?></h2>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="<?= base_url('assets/img/users/') . $users['gambar']; ?>" style="width:500px; margin-right:500px; " class="img-thumbnail">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Username</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6"><?= $users['username']; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Password</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6"><?= $users['password']; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">Alamat</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6"><?= $users['alamat']; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">No HP</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6"><?= $users['no_hp']; ?></div>
                    </div>

                    


                </div>
                <div class="card-footer justify-content-center">
                    <a href="<?= base_url('Users') ?>" class="btn btn-danger">Tutup</a>
                </div>
            </div>
        </div>

    </div>
</div>

</div>