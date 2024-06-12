   <!-- Begin Page Content -->
   <div class="container-fluid">

       <h1 class="h3 mb-2 text-gray-800" style="display: flex; align-items: center;">
           <span>Data Hotel</span>


       </h1>
       <div class="card shadow mb-4">
           <div class="card-header py-3 d-flex justify-content-between align-items-end">
               <h6 class="m-0 font-weight-bold text-primary"></h6>
               <div class="row">
                   <div class="col-md-6 text-right"> <!-- Bagian kanan -->
                       <a href="<?= base_url() ?>Hotel/tambah" class="btn btn-info mb-2" style="width: 180px;">Tambah Cat Hotel</a>
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
                               <td>Nama Hewan</td>
                               <td>Nama Pemilik</td>
                               <td>Alamat</td>
                               <td>Tanggal Masuk</td>
                               <!-- <td>Waktu Masuk</td> -->
                               <td>Tanggal Keluar</td>
                               <!-- <td>Waktu Keluar</td> -->
                               <td>Jasa</td>
                               <td>Status Transaksi</td>
                               <td>Keterangan</td>
                               <td>Aksi</td>
                           </tr>
                       </thead>
                       <tbody>
                           <?php $i = 1; ?>
                           <?php foreach ($hotel as $us) : ?>
                               <tr>
                                   <td><?= $i; ?>.</td>
                                   <td><?= $us['nama_hewan']; ?></td>
                                   <td><?= $us['nama_pemilik']; ?></td>
                                   <td><?= $us['alamat']; ?></td>
                                   <td><?= $us['tanggal_masuk']; ?></td>
                                   <!-- <td><?= $us['waktu_masuk']; ?></td> -->
                                   <td><?= $us['tanggal_keluar']; ?></td>
                                   <!-- <td><?= $us['waktu_keluar']; ?></td> -->
                                   <td><?= $us['nama_jasa']; ?></td>
                                   <td><?= $us['status']; ?></td>
                                   <td><?= $us['keterangan']; ?></td>
                                   <td style="text-align: center;">
                                       <div class="dropdown no-arrow mb-4 animated--grow-in">
                                           <button class="btn btn-info dropdown-toggle" style="width: 40px;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                               <i class="fas fa-info-circle"></i>
                                           </button>
                                           <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                               <a class="btn btn-sm btn-info dropdown-item" href="<?= base_url('Hotel/hapus/') . $us['id_hotel']; ?>" style="display: flex; align-items: center;">
                                                   Hapus
                                                   <i class="fas fa-trash" style="margin-left: 5px;"></i>
                                               </a>
                                               <div class="dropdown-divider"></div>
                                               <a class="btn btn-sm btn-info dropdown-item" href="<?= base_url('Hotel/edit/') . $us['id_hotel']; ?>" style="display: flex; align-items: center;">
                                                   Edit
                                                   <i class="fas fa-edit" style="margin-left: 5px;"></i>
                                               </a>

                                               <div class="dropdown-divider"></div>
                                               <a class="btn btn-sm btn-info dropdown-item" href="<?= base_url('Hotel/detail/') . $us['id_hotel']; ?>" style="display: flex; align-items: center;">
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
   <!-- /.container-fluid -->

   </div>
   <!-- End of Main Content -->