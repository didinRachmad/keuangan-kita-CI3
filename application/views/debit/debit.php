<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row mt-5">
            <div class="col-lg-12 mt-2">
                <div class="row">
                    <div class="col-md-4">
                        <a href="<?= base_url()  ?>keuangan/tambah_debit" class="btn btn-primary mt-1 mb-3">
                            Tambah Debit
                        </a>
                    </div>
                    <div class="col-md-8">
                        <form action="<?= base_url() ?>keuangan/cariDebit" method="POST">
                            <div class="row">
                                <div class="form-group col-md-5">
                                    <select class="form-control" id="bulan" name="bulan">
                                        <?php
                                        $bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                                        if ($this->session->userdata('bulanBeli')) {
                                            $bln = $this->session->userdata('bulanBeli') - 1;
                                            $temp = $this->session->userdata('bulanBeli');
                                        } else {
                                            $bln = date('n') - 1;
                                            $temp = date('n');
                                        }

                                        $nilai = count($bulan);
                                        for ($i = 0; $i < $nilai; $i += 1) {
                                            $j = $i + 1;
                                            if ($bulan[$i] == $bulan[$bln]) {
                                                echo "<option value='$j' selected> $bulan[$i] </option>";
                                            } else {
                                                echo "<option value='$j'> $bulan[$i] </option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-5">
                                    <select class="form-control" id="tahun" name="tahun" title="Pilih Tahun">
                                        <?php
                                        if ($this->session->userdata('tahunBeli')) {
                                            $j = $this->session->userdata('tahunBeli');
                                        } else {
                                            $j = date('Y');
                                        }
                                        for ($i = date('Y') - 1; $i <= date('Y') + 5; $i++) {
                                            if ($i == $j) {
                                                echo "<option value='$i' selected> $i </option>";
                                            } else {
                                                echo "<option value='$i'> $i </option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2 mt-1">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <table class="table table-bordered table-light table-striped shadow-sm bg-light" id="tabel-keuangan" width="100%">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Keterangan </th>
                            <th scope="col" width="15%" class="text-center">Tanggal Transaksi</th>
                            <th scope="col" width="15%" class="text-center">Total Transaksi (Rp) </th>
                            <th scope="col" width="15%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($debit as $db) : ?>
                            <tr>
                                <td class="text-capitalize"><?= $db['keterangan']; ?></td>
                                <td class="text-center"><?= date('d-m-Y', strtotime($db['tanggal_transaksi'])); ?></td>
                                <td class="text-center fw-bolder"><?= number_format($db['total_transaksi'], 0, ',', '.'); ?></td>
                                <td class="text-center"><a href="<?= base_url()  ?>keuangan/edit_debit/<?= $db['id'] ?>" class="btn btn-warning">Edit</a>
                                    <a href="#" class="btn btn-danger" onclick="konfirmasiHapus(<?= $db['id'] ?>)">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr class="text-center fw-bold">
                            <td colspan="2" class="text-center">Total:</td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                        </tr>
                    </tfoot>
                </table>
                <a class="btn btn-primary btn-lg text-light fw-bolder" href="<?= base_url()  ?>keuangan/debitToPdf">PDF FILE</a>
            </div>

    </section>
</div>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="konfirmasiHapusModal" tabindex="-1" aria-labelledby="konfirmasiHapusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="konfirmasiHapusModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="#" id="hapusLink" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>

<script>
    function konfirmasiHapus(id) {
        $('#hapusLink').attr('href', '<?= base_url() ?>keuangan/hapus_debit/' + id);
        $('#konfirmasiHapusModal').modal('show');
    }
</script>