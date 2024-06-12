<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header justify-content-center">
                    Form Ubah Data Users
                </div>
                <div class="card-body">
                    <form action="<?= base_url('Users/update'); ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $users['id']; ?>">
                        <div class="form-group">
                            <label for="nama">Nama Users</label>
                            <input type="text" name="nama_users" value="<?= $users['nama_users']; ?>" class="form-control" id="nama_users" placeholder="Nama Users">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" value="<?= $users['alamat']; ?>" class="form-control" id="alamat" placeholder="alamat">
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No Hp</label>
                            <input type="text" name="no_hp" value="<?= $users['no_hp']; ?>" class="form-control" id="no_hp" placeholder="No Hp">
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <br>
                            <img src="<?= base_url('assets/img/users/') . $users['gambar']; ?>" style="width: 100px;">
                            <input type="file" name="gambar" class="form-control" id="gambar">
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" value="<?= $users['username']; ?>" class="form-control" id="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" name="password" value="<?= $users['password']; ?>" class="form-control" id="password" placeholder="password">
                        </div>
                        <div class="form-group">
                            <a href="<?= base_url('Users') ?>" class="btn btn-danger">Tutup</a>
                            <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Users</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>