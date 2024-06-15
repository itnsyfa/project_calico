<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    Form Tambah Data Hewan
                </div>

                <div class="card-body">
                    <form action="<?= base_url('Hewan/upload'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama_hewan">Nama Hewan</label>
                            <input type="text" name="nama_hewan" class="form-control" id="nama_hewan" placeholder="Masukkan Nama Hewan">
                        </div>
                        <div class="form-group">
                            <label for="nama_pemilik">Nama Pemilik</label>
                            <input type="text" name="nama_pemilik" class="form-control" id="nama_pemilik" placeholder="Masukkan Nama Pemilik">
                        </div>
                        <div class="form-group">
                            <label for="qty">QTY</label>
                            <input type="number" name="qty" class="form-control" id="qty" placeholder="qty" min="0" step="1">
                        </div>
                        <div class="form-group">
                            <label for="ras">Ras</label>
                            <select name="ras" id="ras" class="form-control">
                                <option value="">Pilih Ras</option>
                                <option value="Anggora">Anggora</option>
                                <option value="Bengal">Bengal</option>
                                <option value="BSH">BSH</option>
                                <option value="Bulldog">Bulldog</option>
                                <option value="Chihuahua">Chihuahua</option>
                                <option value="GR">GR</option>
                                <option value="Himalaya">Himalaya</option>
                                <option value="Mainecoon">Mainecoon</option>
                                <option value="Poodle">Poodle</option>
                                <option value="Pug">Pug</option>
                                <option value="Persia">Persia</option>
                                <option value="Samoyed">Samoyed</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Perempuan">Perempuan</option>
                                <option value="Laki-laki">Laki-laki</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukkan Alamat">
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No Hp</label>
                            <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="Masukkan No Hp">
                        </div>
                        <div class="form-group">
                            <a href="<?= base_url('Hewan') ?>" class="btn btn-danger">Tutup</a>
                            <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Hewan</button>
                        </div>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Load jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Load Select2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


<script>
    $(document).ready(function() {
        $('#ras').select2({
            placeholder: "Pilih Ras",
            allowClear: true // menambahkan opsi clear pada Select2
        });
    });

    $(document).ready(function() {
        $('#spesies').select2({
            placeholder: "Pilih Spesies",
            allowClear: true // menambahkan opsi clear pada Select2
        });
    });
    
</script>
