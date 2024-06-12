   <!-- Begin Page Content -->
   <div class="container-fluid">

       <h1 class="h3 mb-2 text-gray-800" style="display: flex; align-items: center;">
           <span>Data Produk</span>
           <!-- <img src="<?= base_url('assets/img/report.gif'); ?>">
        <button id="btnShowReport" class="btn btn-sm btn-primary" style="margin-left: 720px;"> <i class="fa fa-file-pdf"></i>
            Laporan
        </button> -->

       </h1>

       <div class="card shadow mb-4">
               <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-primary">Tambah Stok Produk</h6>
               </div>
               <div class="card-body">
                   <form action="<?= base_url('Produk/uploadExcel'); ?>" method="post" enctype="multipart/form-data">
                       <div class="form-group">
                           <label for="file">Unggah File Excel</label>
                           <input type="file" class="form-control" id="file" name="file" required>
                       </div>
                       <button type="submit" class="btn btn-primary">Unggah</button>
                   </form>
               </div>
           </div>
           
       <div class="card shadow mb-4">
           <div class="card-header py-3">
               <div class="row">
                   <div class="col-md-6"> <!-- Bagian kiri -->
                       <form action="<?= base_url('Produk/filter_and_sort') ?>" method="GET" class="form-inline">
                           <div class="form-group mr-2">
                               <label for="kategori" class="mr-2">Kategori:</label>
                               <select name="kategori" id="kategori" class="form-control">
                                   <option value="">--Pilih Kategori--</option>
                                   <?php foreach ($categories as $category) : ?>
                                       <option value="<?= $category->kategori ?>"><?= $category->kategori ?></option>
                                   <?php endforeach; ?>
                               </select>
                           </div>
                           <button type="submit" class="btn btn-primary">Filter</button>
                       </form>
                   </div>
                   <div class="col-md-6 text-right"> <!-- Bagian kanan -->
                       <a href="<?= site_url() ?>produk/tambah" class="btn btn-info mb-2" style="width: 180px;">Tambah Produk</a>
                   </div>
               </div>
           </div>

         

           <!-- DataTales Example -->
           <div class="card-body">
               <div class="table-responsive">
                   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                       <thead>
                           <tr>
                               <td>No</td>
                               <td>Kode produk</td>
                               <td>Nama Produk</td>
                               <td>Gambar</td>
                               <td>Stok</td>
                               <td>Satuan</td>
                               <td>Kategori</td>
                               <td>Modal</td>
                               <td>Harga</td>
                               <td>Aksi</td>
                           </tr>
                       </thead>
                       <tbody>
                           <?php $i = 1; ?>
                           <?php foreach ($produk as $us) : ?>
                               <tr>
                                   <td><?= $i; ?>.</td>
                                   <td><?= strtoupper($us['kode_produk']); ?></td>
                                   <td><?= $us['nama_produk']; ?></td>
                                   <td>
                                       <?php
                                        $file_ext = pathinfo($us['gambar'], PATHINFO_EXTENSION);
                                        if (in_array($file_ext, ['gif', 'jpg', 'png'])) {
                                            // Tampilkan gambar
                                            echo '<img src="' . base_url('assets/img/produk/') . $us['gambar'] . '" style="width:200px;" class="img-thumbnail">';
                                        } elseif ($file_ext == 'pdf') {
                                            // Tampilkan tautan untuk file PDF
                                            echo '<a href="' . base_url('assets/img/produk/') . $us['gambar'] . '" target="_blank">Lihat PDF</a>';
                                        }
                                        ?>
                                   </td>

                                   <td><?= $us['stok']; ?></td>
                                   <td><?= $us['satuan']; ?></td>
                                   <td><?= $us['kategori']; ?></td>
                                   <td>Rp <?= number_format($us['modal'], 0, ',', '.'); ?></td>
                                   <td>Rp <?= number_format($us['harga'], 0, ',', '.'); ?></td>
                                   <td style="text-align: center;">
                                       <div class="dropdown no-arrow mb-4 animated--grow-in">
                                           <button class="btn btn-info dropdown-toggle" style="width: 40px;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                               <i class="fas fa-info-circle"></i>
                                           </button>
                                           <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                               <a class="btn btn-sm btn-info dropdown-item" href="<?= base_url('Produk/hapus/') . $us['id_produk']; ?>" style="display: flex; align-items: center;">
                                                   Hapus
                                                   <i class="fas fa-trash" style="margin-left: 5px;"></i>
                                               </a>
                                               <div class="dropdown-divider"></div>
                                               <a class="btn btn-sm btn-info dropdown-item" href="<?= base_url('Produk/edit/') . $us['id_produk']; ?>" style="display: flex; align-items: center;">
                                                   Edit
                                                   <i class="fas fa-edit" style="margin-left: 5px;"></i>
                                               </a>

                                               <div class="dropdown-divider"></div>
                                               <a class="btn btn-sm btn-info dropdown-item" href="<?= base_url('Produk/detail/') . $us['id_produk']; ?>" style="display: flex; align-items: center;">
                                                   Detail
                                                   <i class="fas fa-info" style="margin-left: 5px;"></i>
                                               </a>
                                           </div>
                                       </div>
                                   </td>
                               </tr>
                               <?php $i++; ?>
                           <?php endforeach; ?>
                       </tbody>

                   </table>
               </div>
           </div>
       </div>

   </div>



   </div>
   <!-- /.container-fluid -->

   <!-- End of Main Content -->