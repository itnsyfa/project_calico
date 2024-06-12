<div class="container-fluid">
<div class="row">
		<div class="col text-center">
			<h3 class="h3 text-dark"><?= $title ?></h3>
			<!-- <h4 class="h4 text-dark "><strong><?= $perusahaan->nama_perusahaan ?></strong></h4> -->
		</div>
	</div>
	<hr>
	<div class="row">
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr>
					<td>No Transaksi</td>
					<td>Nama Kasir</td>
					<td>Tanggal Penjualan</td>
					<td>Total</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($all_penjualan as $transaksi): ?>
					<tr>
						<td><?= $transaksi->no_transaksi ?></td>
						<td><?= $transaksi->nama_kasir ?></td>
						<td><?= $transaksi->tgl_penjualan ?> Pukul <?= $transaksi->jam_penjualan ?></td>
						<td>Rp <?= number_format($transaksi->total, 0, ',', '.') ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>
</div>