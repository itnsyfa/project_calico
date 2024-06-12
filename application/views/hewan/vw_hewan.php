   <!-- Begin Page Content -->
   <div class="container-fluid">

       <h1 class="h3 mb-2 text-gray-800" style="display: flex; align-items: center;">
           <span>Data Hewan</span>

           <!-- <img src="<?= base_url('assets/img/report.gif'); ?>">
        <button id="btnShowReport" class="btn btn-sm btn-primary" style="margin-left: 720px;"> <i class="fa fa-file-pdf"></i>
            Laporan
        </button> -->

       </h1>
       <div class="card shadow mb-4">
           <div class="card-header py-3 d-flex justify-content-between align-items-end">
               <h6 class="m-0 font-weight-bold text-primary"></h6>
               <div class="row">
                   <div class="col-md-6 text-right"> <!-- Bagian kanan -->
                       <a href="<?= base_url() ?>Hewan/tambah" class="btn btn-info mb-2" style="width: 180px;">Tambah Hewan</a>
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
                               <td>Spesies</td>
                               <td>Ras</td>
                               <td>Jenis Kelamin</td>
                               <td>Alamat</td>
                               <td>No HP</td>
                               <td>Aksi</td>
                           </tr>
                       </thead>
                       <tbody>
                           <?php $i = 1; ?>
                           <?php foreach ($hewan as $us) : ?>
                               <tr>
                                   <td><?= $i; ?>.</td>
                                   <td><?= $us['nama_hewan']; ?></td>
                                   <td><?= $us['nama_pemilik']; ?></td>
                                   <td><?= $us['spesies']; ?></td>
                                   <td><?= $us['ras']; ?></td>
                                   <td><?= $us['jenis_kelamin']; ?></td>
                                   <td><?= $us['alamat']; ?></td>
                                   <td><?= $us['no_hp']; ?></td>
                                   <td style="text-align: center;">
                                       <div class="dropdown no-arrow mb-4 animated--grow-in">
                                           <button class="btn btn-info dropdown-toggle" style="width: 40px;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                               <i class="fas fa-info-circle"></i>
                                           </button>
                                           <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                               <a class="btn btn-sm btn-info dropdown-item" href="<?= base_url('Hewan/hapus/') . $us['id_hewan']; ?>" style="display: flex; align-items: center;">
                                                   Hapus
                                                   <i class="fas fa-trash" style="margin-left: 5px;"></i>
                                               </a>
                                               <div class="dropdown-divider"></div>
                                               <a class="btn btn-sm btn-info dropdown-item" href="<?= base_url('Hewan/edit/') . $us['id_hewan']; ?>" style="display: flex; align-items: center;">
                                                   Edit
                                                   <i class="fas fa-edit" style="margin-left: 5px;"></i>
                                               </a>

                                               <div class="dropdown-divider"></div>
                                               <a class="btn btn-sm btn-info dropdown-item" href="<?= base_url('Hewan/detail/') . $us['id_hewan']; ?>" style="display: flex; align-items: center;">
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