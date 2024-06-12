<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header justify-content-center">
                    Form Tambah Data Users
                </div>

            <div class="card-body">
                <form action="<?= base_url('Users/upload'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama_users">Nama Users</label>
                        <input type="text" name="nama_users" class="form-control" id="nama_users" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat">
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No Hp</label>
                        <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="No Hp">
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label><br>
                        <input type="file" name="gambar" class="form_control" id="gambar"  placeholder="Gambar">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" name="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <a href="<?= base_url('Users') ?>" class="btn btn-danger">Tutup</a>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Users</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>