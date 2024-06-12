   <!-- Begin Page Content -->
   <div class="container-fluid">

       <div id="content-wrapper" class="d-flex flex-column">
           <div id="content" data-url="<?= base_url('Transaksi') ?>">
               <!-- load Topbar -->

               <div class="container-fluid">
                   <div class="clearfix">
                       <div class="float-left">
                           <h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
                       </div>
                       <div class="float-right">
                           <a href="<?= base_url('Transaksi/export') ?>" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf"></i>&nbsp;&nbsp;Export</a>
                           <a href="<?= base_url('Transaksi/tambah') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>
                       </div>
                   </div>
                   <hr>
                   <?php if ($this->session->flashdata('success')) : ?>
                       <div class="alert alert-success alert-dismissible fade show" role="alert">
                           <?= $this->session->flashdata('success') ?>
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                       </div>
                   <?php elseif ($this->session->flashdata('error')) : ?>
                       <div class="alert alert-danger alert-dismissible fade show" role="alert">
                           <?= $this->session->flashdata('error') ?>
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                       </div>
                   <?php endif ?>
                   <div class="card shadow mb-5">
                       <div class="card-header"><strong>Daftar Transaksi</strong></div>
                       <div class="card-body">
                           <div class="table-responsive">
                               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                   <thead>
                                       <tr>
                                           <td>No Transaksi</td>
                                           <td>Nama Kasir</td>
                                           <td>Tanggal Transaksi</td>
                                           <td>Total</td>
                                           <td>Aksi</td>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       <?php foreach ($all_penjualan as $transaksi) : ?>
                                           <tr>
                                               <td><?= $transaksi->no_transaksi ?></td>
                                               <td><?= $transaksi->nama_kasir ?></td>
                                               <td><?= $transaksi->tgl_penjualan ?> Pukul <?= $transaksi->jam_penjualan ?></td>
                                               <td>Rp <?= number_format($transaksi->total, 0, ',', '.') ?></td>
                                               <td>
                                                   <a href="<?= base_url('Transaksi/detail/' . $transaksi->no_transaksi) ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                                   <a onclick="return confirm('apakah anda yakin?')" href="<?= base_url('Transaksi/hapus/' . $transaksi->no_transaksi) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                               </td>
                                           </tr>
                                       <?php endforeach ?>
                                   </tbody>
                               </table>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <!-- /.container-fluid -->
       </div>
   </div>
   <!-- End of Main Content -->
                                       </div>