<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Detail Data Rawat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Nama Hewan:</strong> <?= $rawat['nama_hewan']; ?></li>
                            <li class="list-group-item"><strong>Tanggal Masuk:</strong> <?= $rawat['tanggal_masuk']; ?></li>
                            <li class="list-group-item"><strong>Diagnosa:</strong> <?= $rawat['diagnosa']; ?></li>
                            <li class="list-group-item"><strong>Berat Badan:</strong> <?= $rawat['berat_badan']; ?></li>
                            <li class="list-group-item"><strong>Suhu Badan:</strong> <?= $rawat['suhu_badan']; ?></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Gejala Klinis:</strong> <?= $rawat['gejala_klinis']; ?></li>
                            <li class="list-group-item"><strong>Perawatan:</strong> <?= $rawat['perawatan']; ?></li>
                            <li class="list-group-item"><strong>Dokter:</strong> <?= $rawat['dokter']; ?></li>
                            <li class="list-group-item"><strong>Tanggal Diberi Obat:</strong> <?= $rawat['tgl_diberi_obat']; ?></li>
                            <li class="list-group-item"><strong>Waktu:</strong> <?= $rawat['waktu']; ?></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Keterangan:</strong> <?= $rawat['keterangan']; ?></li>
                            <li class="list-group-item"><strong>Therapy:</strong> <?= $rawat['therapy']; ?></li>
                            <li class="list-group-item"><strong>Status:</strong> <?= $rawat['status']; ?></li>
                            <li class="list-group-item"><strong>Tanggal Keluar:</strong> <?= $rawat['tanggal_keluar']; ?></li>
                        </ul>
                    </div>
                </div>
                <div id="detailData"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>